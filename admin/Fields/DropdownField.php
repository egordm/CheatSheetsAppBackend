<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 01:26
 */

namespace Admin\Fields;


class DropdownField extends Field
{
    protected $options;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param array $options
     * @param array $params
     */
    public function __construct($name, $label, $options, $params = [])
    {
        parent::__construct($name, $label, true, $params);
        $this->options = $options;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function format($value)
    {
        if(isset($this->options[$value])) {
            return $this->options[$value];
        }
        return 'Not found';
    }

    public function getView()
    {
        return 'elements.fields.dropdown';
    }

    public function getValidationRules()
    {
        $this->params['required'] = false;
        return parent::getValidationRules() + ['numeric', 'digits_between:0,'.count($this->options)];
    }
}