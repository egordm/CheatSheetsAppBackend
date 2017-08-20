<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 21-8-2017
 * Time: 00:04
 */

namespace Admin\Models;


class LinkMenuItem extends MenuItem
{
    protected $link;
    protected $title;
    protected $params;

    /**
     * MenuLink constructor.
     * @param $link
     * @param $title
     * @param $params
     */
    public function __construct($link, $title, $params)
    {
        $this->link = $link;
        $this->title = $title;
        $this->params = $params;
    }


    function render()
    {
        $icon = '';
        if(isset($this->params['icon'])) $icon = '<i class="fa fa-'.$this->params['icon'].'"></i>';
        return "<a class='nav-link' href='$this->link'>$icon $this->title</a>";
    }
}