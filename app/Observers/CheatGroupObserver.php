<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 21:41
 */

namespace App\Observers;


use Admin\Models\BaseModel;
use App\Models\CheatGroup;

class CheatGroupObserver extends BaseObserver
{

    /**
     * @param BaseModel|CheatGroup $model
     */
    public function changed(BaseModel $model)
    {
        CheatSheetObserver::invalidateCheatSheet($model->cheat_sheet->id);
    }
}