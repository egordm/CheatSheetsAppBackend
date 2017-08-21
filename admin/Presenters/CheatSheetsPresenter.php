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
use App\Models\CheatSheet;

class CheatSheetsPresenter extends Presenter
{
    /**
     * CheatSheetsPresenter constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'id' => new IntegerField('id', 'ID', false),
            'title' => new StringField('title', 'Title', true, ['display' => true]),
            'ctype' => new DropdownField('ctype', 'Type', ['Native', 'PDF']),
            'category_id' => new RelationDropdown('category_id', 'Category', 'categories', 'title'),
            'subtitle' => new StringField('subtitle', 'Subtitle', true, ['required' => false]),
            'description' => new TextField('description', 'Description', true, ['required' => false]),
            'beta' => new BooleanField('beta', 'Beta'),
            'created_at' => new DateTimeField('created_at', 'Created At', false),
            'updated_at' => new DateTimeField('updated_at', 'Updated At', false),
        ]);
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return CheatSheet::class;
    }

    public function getIndexFields()
    {
        return ['id', 'ctype', 'title', 'category_id', 'beta', 'updated_at'];
    }

    public function getSearchFields()
    {
        return ['id', 'ctype', 'title', 'subtitle', 'description'];
    }

    public function getRouteName()
    {
        return 'cheat-sheets';
    }

    public function getRelations()
    {
        return [

        ];
    }

    public function getTitle()
    {
        return 'Cheat Sheets';
    }
}