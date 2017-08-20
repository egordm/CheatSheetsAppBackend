<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 20-8-2017
 * Time: 23:53
 */

namespace Admin\Helpers;


use Admin\Models\LinkMenuItem;
use Admin\Models\ModelItemMenuItem;

class MenuHelper
{
    public static function getMenus()
    {
        return [
            new LinkMenuItem(route('home'), 'Home', ['icon' => 'home']),
            new ModelItemMenuItem('categories', 'Categories', ['icon' => 'sort-alpha-asc']),
            new ModelItemMenuItem('cheat-sheets', 'Cheat Sheets', ['icon' => 'align-justify']),
        ];
    }
}