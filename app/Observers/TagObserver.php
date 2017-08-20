<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 21:41
 */

namespace App\Observers;


use Admin\Models\BaseModel;
use App\Models\Tag;

class TagObserver extends BaseObserver
{

    /**
     * @param BaseModel|Tag $model
     */
    public function changed(BaseModel $model)
    {
        foreach ($model->getCheatSheets() as $cheatSheet) {
            CheatSheetObserver::invalidateCheatSheet($cheatSheet->id);
        }
    }
}