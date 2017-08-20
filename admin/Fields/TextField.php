<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 01:22
 */

namespace Admin\Fields;


class TextField extends Field
{

    public function format($value)
    {
        return $value;
    }

    public function getView()
    {
        return 'elements.fields.text';
    }
}