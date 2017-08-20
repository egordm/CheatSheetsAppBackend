<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 01:33
 */

namespace Admin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseModel extends Model
{
    public function push()
    {
        $temp_rels = $this->relations; //IMPORTANT: because observer might mess this up after save
        if (!$this->save()) return false;

        // To sync all of the relationships to the database, we will simply spin through
        // the relationships and save each model via this "push" method, which allows
        // us to recurse into all of these nested relations for the model instance.

        foreach ($temp_rels as $models) {
            foreach (Collection::make($models) as $model) {
                $foreign_key = $this->getForeignKey();
                $model_table = $model->getTable();
                if (\Schema::hasColumn($model_table, $foreign_key)) { // One to many
                    $model->$foreign_key = $this->id;
                    if (!$model->push()) return false;
                } else if(method_exists($this, $model_table) ){ //Many to many
                    $ret = $model->push();
                    if(!$ret) return false;
                    $this->$model_table()->attach($model->id);
                }
            }
        }

        return true;
    }
}