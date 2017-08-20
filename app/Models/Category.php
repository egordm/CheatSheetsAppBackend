<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 13:04
 */

namespace App\Models;


use Admin\Models\BaseModel;
use App\Models\Transformers\CategoryTransformer;
use League\Fractal\Resource\Collection;

/**
 * App\Models\Category
 *
 * @mixin \Illuminate\Database\Eloquent\
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CheatSheet[] $cheat_sheets
 */
class Category extends BaseModel
{
    public function cheat_sheets()
    {
        return $this->hasMany(CheatSheet::class);
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
        $this->exists = true;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string|null $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param \Carbon\Carbon $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @param \Carbon\Carbon $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param CheatSheet[] $cheat_sheets
     */
    public function setCheatSheets($cheat_sheets)
    {
        if(empty($this->relations['cheat_sheets'])) $this->relations['cheat_sheets'] = [];
        $this->relations['cheat_sheets'] = array_merge($this->relations['cheat_sheets'], $cheat_sheets);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection|array $data
     * @return \League\Fractal\Resource\Collection
     */
    public static function transformArray($data)
    {
        return new Collection($data, new CategoryTransformer());
    }
}