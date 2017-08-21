<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 18-8-2017
 * Time: 23:47
 */

namespace Admin\Controllers;

use Admin\Presenters\CheatsPresenter;

class CheatsController extends CrudController
{
    /**
     * CheatSheetsController constructor.
     * @param CheatsPresenter $presenter
     */
    public function __construct(CheatsPresenter $presenter)
    {
        parent::__construct($presenter);
    }
}