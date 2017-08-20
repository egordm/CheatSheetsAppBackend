<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 20:28
 */

namespace App\Observers;

use Admin\Models\BaseModel;

abstract class BaseObserver
{
    public function created(BaseModel $model)
    {
        $this->changed($model);
    }

    public function updated(BaseModel $model)
    {
        $this->changed($model);

    }

    public function deleted(BaseModel $model)
    {
        $this->changed($model);
    }

    public function restored(BaseModel $model)
    {
        $this->changed($model);
    }

    public abstract function changed(BaseModel $model);
}