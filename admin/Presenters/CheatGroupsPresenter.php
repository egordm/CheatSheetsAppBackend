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
use App\Models\CheatGroup;
use App\Models\PDF;

class CheatGroupsPresenter extends Presenter
{
    /**
     * CheatSheetsPresenter constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'id' => new IntegerField('id', 'ID', false),
            'cheat_sheet_id' => new RelationDropdown('cheat_sheet_id', 'Cheat Sheet', 'cheat_sheets', 'title', ['route' => 'cheat-sheets']),
            'title' => new StringField('title', 'Title', true),
            'description' => new TextField('description', 'Description', true, ['required' => false]),
            'created_at' => new DateTimeField('created_at', 'Created At', false),
            'updated_at' => new DateTimeField('updated_at', 'Updated At', false),
        ]);
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return CheatGroup::class;
    }

    public function getIndexFields()
    {
        return ['id', 'cheat_sheet_id', 'title', 'updated_at'];
    }

    public function getSearchFields()
    {
        return ['id','title', 'description'];
    }

    public function getRouteName()
    {
        return 'cheat-groups';
    }

    public function getRelations()
    {
        return [
            'cheats' => new CheatsPresenter(),
        ];
    }

    public function getTitle()
    {
        return 'Cheat Groups';
    }
}