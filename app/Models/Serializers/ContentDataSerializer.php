<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 16:35
 */

namespace App\Models\Serializers;


use App\Models\BaseModel;

class ContentDataSerializer
{
    /**
     * @param BaseModel[]|null $models
     * @return array
     */
    public static function serialize($models) {
        if($models == null) return [];
        $ret = [];
        foreach ($models as $model) {
            array_push($ret, $model->content);
        }
        return $ret;
    }
}