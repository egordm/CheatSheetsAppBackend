<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 17-8-2017
 * Time: 20:57
 */


namespace App\Models;

use Admin\Models\BaseModel;

/**
 * App\Models\PDF
 *
 * @property-read \App\Models\CheatSheet $cheat_sheet
 * @mixin \Eloquent
 * @property int $cheat_sheet_id
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PDF whereCheatSheetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PDF whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PDF whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PDF whereUrl($value)
 */
class PDF extends BaseModel
{
    public $guarded = [];

    public function getTable()
    {
        return 'pdfs';
    }

    public function cheat_sheet()
    {
        return $this->hasOne(CheatSheet::class);
    }
}