<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 01:16
 */

namespace Admin\Fields;


class StringField extends Field
{
    public function format($value)
    {
        return $value;
    }

    public function getView()
    {
       return 'elements.fields.string';
    }
}