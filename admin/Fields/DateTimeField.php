<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 01:23
 */

namespace Admin\Fields;


class DateTimeField extends Field
{

    public function format($value)
    {
        return $value; //TODO: format
    }

    public function getView()
    {
        return 'elements.fields.datetime';
    }

    public function getValidationRules()
    {
        return parent::getValidationRules() + ['date'];
    }
}