<?php
/**
 * Created by PhpStorm.
 * User: EgorDm
 * Date: 20-Jun-2017
 * Time: 13:04
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

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
 * @property-read \App\Models\CheatSheet[] $cheatSheets
 */
class Category extends Model
{
    public $guarded = [];

    public function cheatSheets()
    {
        return $this->hasMany(CheatSheet::class);
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $description
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
     * @param CheatSheet[]
     */
    public function setCheatSheets($cheatSheets)
    {
        $this->cheatSheets = $cheatSheets;
    }
}