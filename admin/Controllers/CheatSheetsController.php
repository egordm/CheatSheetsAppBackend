<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 18-8-2017
 * Time: 23:47
 */

namespace Admin\Controllers;

use Admin\Presenters\CheatSheetsPresenter;

class CheatSheetsController extends CrudController
{
    /**
     * CheatSheetsController constructor.
     * @param CheatSheetsPresenter $presenter
     */
    public function __construct(CheatSheetsPresenter $presenter)
    {
        parent::__construct($presenter);
    }
}