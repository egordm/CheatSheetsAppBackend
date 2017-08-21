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
use Admin\Fields\IntegerField;
use Admin\Fields\StringField;
use Admin\Fields\TextField;
use App\Models\Category;

class CategoriesPresenter extends Presenter
{
    /**
     * CheatSheetsPresenter constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'id' => new IntegerField('id', 'ID', false),
            'title' => new StringField('title', 'Title', true, ['display' => true]),
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
        return Category::class;
    }

    public function getIndexFields()
    {
        return ['id', 'title', 'beta', 'updated_at'];
    }

    public function getSearchFields()
    {
        return ['id', 'title', 'description'];
    }

    public function getRouteName()
    {
        return 'categories';
    }

    public function getRelations()
    {
        return [
            'cheat_sheets' => new CheatSheetsPresenter(),
        ];
    }

    public function getTitle()
    {
        return 'Categories';
    }
}