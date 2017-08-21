<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 01:16
 */

namespace Admin\Fields;

abstract class Field
{
    protected $name;
    protected $label;
    protected $editable;
    protected $params;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param bool $editable
     * @param array $params
     */
    public function __construct($name, $label, $editable = true, $params = [])
    {
        $this->name = $name;
        $this->label = $label;
        $this->editable = $editable;
        $this->params = $params;
    }

    public function renderInput($model = null, $error = null)
    {
        return view($this->getView(), ['field' => $this, 'model' => $model, 'error' => $error]);
    }

    public abstract function getView();

    public abstract function format($value);

    public function formatModel($model)
    {
        return $this->format($this->getValue($model));
    }

    public function getValue($model)
    {
        if(is_array($model) && isset($model[$this->name])) {
            return $model[$this->name];
        } elseif (is_object($model)) {
            return $model->{$this->name};
        }
        return $this->getDefault();
    }

    public function parseValue($value)
    {
        return $value;
    }

    public function getDefault()
    {
        if(isset($this->params['default'])) return $this->params['default'];
        return null;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    public function isEditable()
    {
        return $this->editable;
    }

    public function getValidationRules()
    {
        $ret = isset($this->params['rules']) ? $this->params['rules'] : [];
        if((!isset($this->params['required']) && $this->isEditable()) || (isset($this->params['required']) && $this->params['required'])) {
            $ret[] = 'required';
        }
        return $ret;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setParam($key, $value)
    {
        $this->params[$key] = $value;
    }
}