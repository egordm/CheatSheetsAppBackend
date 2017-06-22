<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 20:32
 */

namespace App\Observers;


use App\Constants;
use App\Models\BaseModel;
use App\Models\Category;

class CategoryObserver extends BaseObserver
{
    /**
     * @param BaseModel|Category $model
     */
    public function changed(BaseModel $model)
    {
        \Cache::forget(Constants::CACHE_KEY_CATEGORIES);
    }
}