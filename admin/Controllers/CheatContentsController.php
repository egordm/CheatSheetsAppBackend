<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 18-8-2017
 * Time: 23:47
 */

namespace Admin\Controllers;

use Admin\Presenters\CheatContentsPresenter;

class CheatContentsController extends CrudController
{
    /**
     * CheatSheetsController constructor.
     * @param CheatContentsPresenter $presenter
     */
    public function __construct(CheatContentsPresenter $presenter)
    {
        parent::__construct($presenter);
    }
}