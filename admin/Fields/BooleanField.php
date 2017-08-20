<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 01:21
 */

namespace Admin\Fields;


class BooleanField extends Field
{
    public function format($value)
    {
        return $value ? 'Yes' : 'No';
    }

    public function getView()
    {
        return 'elements.fields.boolean';
    }

    public function parseValue($value)
    {
        if($value == 'on') return true;
        return $value == true;
    }

    public function getValidationRules()
    {
        $this->params['required'] = false;
        return parent::getValidationRules() + ['boolean'];
    }


}