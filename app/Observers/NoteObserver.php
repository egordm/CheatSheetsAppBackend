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
use App\Models\Cheat;
use App\Models\CheatContent;
use App\Models\CheatGroup;
use App\Models\CheatSheet;
use App\Models\Note;
use App\Models\Tag;

class NoteObserver extends BaseObserver
{

    /**
     * @param BaseModel|Note $model
     */
    public function changed(BaseModel $model)
    {
        CheatSheetObserver::invalidateCheatSheet($model->cheat_sheet->id);
    }
}