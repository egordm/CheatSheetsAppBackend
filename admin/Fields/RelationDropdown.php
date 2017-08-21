<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 20-8-2017
 * Time: 00:40
 */

namespace Admin\Fields;


class RelationDropdown extends DropdownField
{
    protected $table;
    protected $field;

    /**
     * RelationDropdown constructor.
     * @param string $name
     * @param string $label
     * @param string $table
     * @param string $field
     * @param array $params
     */
    public function __construct($name, $label, $table, $field, $params = [])
    {
        parent::__construct($name, $label, null, $params);
        $this->table = $table;
        $this->field = $field;
    }

    public function getOptions()
    {
        $ret = [];
        $items = \DB::table($this->table)->select(['id', $this->field])->get();
        foreach ($items as $item) {
            $ret[$item->id] = $item->{$this->field};
        }
        return $ret;
    }

    public function getOption($value)
    {
        return \DB::table($this->table)->find(intval($value), [$this->field]);
    }


    public function formatModel($model)
    {
        $ret = parent::formatModel($model);
        if(isset($this->params['route'])) {
            $link = route($this->params['route'].'.show', ['id' => $model->{$this->getName()}]);
            return "<a href='$link'>$ret</a>";
        }
        return $ret;
    }

    public function format($value)
    {
        $relation = $this->getOption($value);
        return !empty($relation) ? $relation->{$this->field} : 'Not found';
    }

    public function getValidationRules()
    {
        $this->params['required'] = false;
        return Field::getValidationRules() + ['numeric', 'exists:'.$this->table.',id'];
    }


}