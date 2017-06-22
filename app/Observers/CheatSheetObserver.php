<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 21:41
 */

namespace App\Observers;


use App\Constants;
use App\Models\BaseModel;
use App\Models\CheatSheet;

class CheatSheetObserver extends BaseObserver
{

    /**
     * @param BaseModel|CheatSheet $model
     */
    public function changed(BaseModel $model)
    {
        \Cache::forget(Constants::CACHE_KEY_CATEGORIES);
        self::invalidateCheatSheet($model->id);
    }

    public static function invalidateCheatSheet($id) {
        \Cache::forget(Constants::CACHE_KEY_PREFIX_CHEATSHEET . $id);
    }
}