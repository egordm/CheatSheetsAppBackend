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
 * App\Models\Note
 *
 * @property int $id
 * @property int $cheat_group_id
 * @property string $content
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereCheatGroupId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Note whereId($value)
 * @mixin \Illuminate\Database\Eloquent\
 */
class Note extends Model
{

}