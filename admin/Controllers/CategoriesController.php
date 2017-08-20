<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 18-8-2017
 * Time: 23:47
 */

namespace Admin\Controllers;

use Admin\Presenters\CategoriesPresenter;
use Admin\Presenters\CheatSheetsPresenter;

class CategoriesController extends CrudController
{
    /**
     * CheatSheetsController constructor.
     * @param CategoriesPresenter $presenter
     */
    public function __construct(CategoriesPresenter $presenter)
    {
        parent::__construct($presenter);
    }
}