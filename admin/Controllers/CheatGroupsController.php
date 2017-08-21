<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 18-8-2017
 * Time: 23:47
 */

namespace Admin\Controllers;

use Admin\Presenters\CheatGroupsPresenter;

class CheatGroupsController extends CrudController
{
    /**
     * CheatSheetsController constructor.
     * @param CheatGroupsPresenter $presenter
     */
    public function __construct(CheatGroupsPresenter $presenter)
    {
        parent::__construct($presenter);
    }
}