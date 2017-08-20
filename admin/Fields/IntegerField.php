<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 01:20
 */

namespace Admin\Fields;


class IntegerField extends Field
{
    public function format($value)
    {
        return strval($value);
    }

    public function getView()
    {
        return 'elements.fields.integer';
    }

    public function getValidationRules()
    {
        return parent::getValidationRules() + ['numeric'];
    }
}