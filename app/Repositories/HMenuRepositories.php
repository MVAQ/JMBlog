<?php
/**
 * Created by PhpStorm.
 * User: МВА
 * Date: 29.04.2019
 * Time: 15:22
 */
namespace JMApp\Repositories;
use JMApp\HMenu;
class HMenuRepositories extends Repository{



    public function  __construct(HMenu $menu)
    {
        $this->model = $menu;
    }
}
