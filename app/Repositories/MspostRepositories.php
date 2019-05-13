<?php
/**
 * Created by PhpStorm.
 * User: МВА
 * Date: 01.05.2019
 * Time: 13:37
 */

namespace JMApp\Repositories;
use JMApp\Mspost;
class MspostRepositories extends Repository{



    public function  __construct(Mspost $msposts)
    {
        $this->model = $msposts;
    }
    public function  one($alias, $attr =array()){
        $mspost = parent::one($alias, $attr);
        if($mspost && !empty($attr)){

            $mspost->load('comments');
            $mspost->comments->load('user');
        }
        return $mspost;

    }
}
