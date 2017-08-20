<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 20-8-2017
 * Time: 23:55
 */

namespace Admin\Models;


class ModelItemMenuItem extends LinkMenuItem
{

    /**
     * ModelMenuItem constructor.
     * @param $route
     * @param $title
     * @param $params
     */
    public function __construct($route, $title, $params = [])
    {
        parent::__construct(route("$route.index"), $title, $params);
    }
}