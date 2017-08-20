<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 01:14
 */

namespace Admin\Helpers;


use Admin\Fields\BooleanField;
use Admin\Fields\DateTimeField;
use Admin\Fields\DropdownField;
use Admin\Fields\IntegerField;
use Admin\Fields\StringField;
use Admin\Fields\TextField;

class FieldHelper
{
    public static $field_types = [
        'string' => StringField::class,
        'integer' => IntegerField::class,
        'boolean' => BooleanField::class,
        'text' => TextField::class,
        'datetime' => DateTimeField::class,
        'dropdown' => DropdownField::class
    ];

    public static function formatField($name, $field, $value) {
        return self::fieldInstance($name, $field)->format($value);
    }

    public static function fieldInstance($name, $field) {
        $type = $field['type'];
        if(empty(self::$field_types[$type])) throw new \Exception('Wrong field type');
        return (new self::$field_types[$type]($name, $field));
    }
}