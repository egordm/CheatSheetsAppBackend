<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 20-8-2017
 * Time: 00:01
 */

namespace Admin\Repositories;


use Admin\Presenters\Presenter;
use Illuminate\Support\Facades\Validator;

class Repository
{
    protected $presenter;

    /**
     * Repository constructor.
     * @param Presenter $presenter
     */
    public function __construct($presenter)
    {
        $this->presenter = $presenter;
    }

    public function getIndex()
    {
        return call_user_func($this->getPresenter()->getModelClass() . '::select', $this->getPresenter()->getIndexFields());
    }

    public function getModel($id, $fields = null)
    {
        if ($fields == null) $fields = array_keys($this->getPresenter()->getFields());
        return call_user_func($this->getPresenter()->getModelClass() . '::find', $id, $fields);
    }

    public function createInstance($inputs = [])
    {
        foreach($inputs as $key => $value) {
            if(!isset($this->getPresenter()->getFields()[$key]))
                unset($inputs[$key]);
        }

        $modelClass = $this->getPresenter()->getModelClass();
        return new $modelClass($inputs);
    }

    public function delete($id)
    {
        return call_user_func($this->getPresenter()->getModelClass() . '::destroy', $id);
    }

    public function parseInputs($inputs)
    {
        $ret = [];
        foreach($inputs as $key => $value) {
            if(!isset($this->getPresenter()->getFields()[$key])) continue;
            $ret[$key] = $this->getPresenter()->getFields()[$key]->parseValue($value);
        }
        return $ret;
    }

    /**
     * @param $data
     * @return Validator
     */
    public function validate($data)
    {
        $rules = [];
        foreach ($this->getPresenter()->getFields() as $field) {
            $rule = $field->getValidationRules();
            if (empty($rule)) continue;
            $rules[$field->getName()] = implode('|', $rule);
        }
        return \Validator::make($data, $rules);
    }

    /**
     * @return Presenter
     */
    public function getPresenter()
    {
        return $this->presenter;
    }
}