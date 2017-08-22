<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 20:32
 */

namespace App\Observers;


use Admin\Models\BaseModel;
use App\Constants;
use App\Helpers\CacheHelper;
use App\Models\Category;
use Monolog\Logger;

class CategoryObserver extends BaseObserver
{
    /**
     * @param BaseModel|Category $model
     */
    public function changed(BaseModel $model)
    {
        CacheHelper::deleteCache(Constants::CACHE_KEY_CATEGORIES);
    }
}