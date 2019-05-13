<?php
/**
 * Created by PhpStorm.
 * User: МВА
 * Date: 01.05.2019
 * Time: 13:37
 */

namespace JMApp\Repositories;
use JMApp\Portpholio;
class PortpholioRepositories extends Repository{



    public function  __construct(Portpholio $portpholio)
    {
        $this->model = $portpholio;
    }

}
