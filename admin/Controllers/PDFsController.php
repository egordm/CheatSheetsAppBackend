<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 18-8-2017
 * Time: 23:47
 */

namespace Admin\Controllers;

use Admin\Presenters\PDFsPresenter;

class PDFsController extends CrudController
{
    /**
     * PDFsController constructor.
     * @param PDFsPresenter $presenter
     */
    public function __construct(PDFsPresenter $presenter)
    {
        parent::__construct($presenter);
    }
}