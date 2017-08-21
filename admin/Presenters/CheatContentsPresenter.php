<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 19-8-2017
 * Time: 23:36
 */

namespace Admin\Presenters;

use Admin\Fields\BooleanField;
use Admin\Fields\DateTimeField;
use Admin\Fields\DropdownField;
use Admin\Fields\IntegerField;
use Admin\Fields\RelationDropdown;
use Admin\Fields\StringField;
use Admin\Fields\TextField;
use App\Models\Category;
use App\Models\Cheat;
use App\Models\CheatContent;
use App\Models\CheatGroup;
use App\Models\PDF;

class CheatContentsPresenter extends Presenter
{
    /**
     * CheatSheetsPresenter constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'id' => new IntegerField('id', 'ID', false),
            'cheat_id' => new RelationDropdown('cheat_id', 'Cheat', 'cheats', 'description', ['route' => 'cheats']),
            'content' => new TextField('content', 'Content', true),
        ]);
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return CheatContent::class;
    }

    public function getIndexFields()
    {
        return ['id', 'cheat_id', 'content'];
    }

    public function getSearchFields()
    {
        return ['id','content', 'cheat_id'];
    }

    public function getRouteName()
    {
        return 'cheat-contents';
    }

    public function getRelations()
    {
        return [
        ];
    }

    public function getTitle()
    {
        return 'Cheat Contents';
    }
}