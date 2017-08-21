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
use App\Models\PDF;

class CheatsPresenter extends Presenter
{
    /**
     * CheatSheetsPresenter constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'id' => new IntegerField('id', 'ID', false),
            'cheat_group_id' => new RelationDropdown('cheat_group_id', 'Cheat Group', 'cheat_groups', 'title', ['route' => 'cheat-groups']),
            'layout' => new DropdownField('layout', 'Layout', ['Content - Content', 'Content - Description', 'Content / Content']),
            'description' => new TextField('description', 'Description', true, ['required' => false]),
            'usage' => new TextField('usage', 'Usage', true, ['required' => false]),
            'source' => new StringField('source', 'Source', true, ['required' => false]),
            'created_at' => new DateTimeField('created_at', 'Created At', false),
            'updated_at' => new DateTimeField('updated_at', 'Updated At', false),
        ]);
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Cheat::class;
    }

    public function getIndexFields()
    {
        return ['id', 'cheat_group_id', 'layout', 'updated_at'];
    }

    public function getSearchFields()
    {
        return ['id', 'description', 'usage', 'source'];
    }

    public function getRouteName()
    {
        return 'cheats';
    }

    public function getRelations()
    {
        return [
            'cheat_contents' => new CheatContentsPresenter(),
        ];
    }

    public function getTitle()
    {
        return 'Cheats';
    }
}