<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 21:41
 */

namespace App\Observers;


use Admin\Models\BaseModel;
use App\Constants;
use App\Helpers\CacheHelper;
use App\Models\CheatSheet;

class CheatSheetObserver extends BaseObserver
{

    /**
     * @param BaseModel|CheatSheet $model
     */
    public function changed(BaseModel $model)
    {
        CacheHelper::deleteCache(Constants::CACHE_KEY_CATEGORIES);
        self::invalidateCheatSheet($model->id);
    }

    public static function invalidateCheatSheet($id) {
        CacheHelper::deleteCache(Constants::CACHE_KEY_PREFIX_CHEATSHEET . $id);
    }
}