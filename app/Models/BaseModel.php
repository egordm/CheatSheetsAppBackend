<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 22-Jun-2017
 * Time: 1:14
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * App\Models\BaseModel
 *
 * @mixin \Eloquent
 */
abstract class BaseModel extends Model
{
    public function push()
    {
        if (!$this->save()) return false;

        // To sync all of the relationships to the database, we will simply spin through
        // the relationships and save each model via this "push" method, which allows
        // us to recurse into all of these nested relations for the model instance.

        foreach ($this->relations as $models) {
            foreach (Collection::make($models) as $model) {
                $foreign_key = $this->getForeignKey();
                $model->$foreign_key = $this->id;
                if (!$model->push()) return false;
            }
        }

        return true;
    }
}