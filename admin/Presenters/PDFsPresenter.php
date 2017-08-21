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
use Admin\Fields\RelationDropdown;
use Admin\Fields\StringField;
use Admin\Fields\TextField;
use App\Models\Category;
use App\Models\PDF;

class PDFsPresenter extends Presenter
{
    /**
     * CheatSheetsPresenter constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'cheat_sheet_id' => new RelationDropdown('cheat_sheet_id', 'Cheat Sheet', 'cheat_sheets', 'title', ['route' => 'cheat-sheets']),
            'url' => new StringField('url', 'URL', true, ['display' => true]),
            'created_at' => new DateTimeField('created_at', 'Created At', false),
            'updated_at' => new DateTimeField('updated_at', 'Updated At', false),
        ]);
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return PDF::class;
    }

    public function getIndexFields()
    {
        return ['cheat_sheet_id', 'url', 'updated_at'];
    }

    public function getSearchFields()
    {
        return ['cheat_sheet_id', 'url'];
    }

    public function getRouteName()
    {
        return 'pdfs';
    }

    public function getRelations()
    {
        return [
        ];
    }

    public function getTitle()
    {
        return 'PDFs';
    }
}