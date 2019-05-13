<?php
namespace JMApp\Repositories;
use JMApp\Slider;

class SliderRepositorys extends Repository{

    public function  __construct(Slider $slider)
    {
        $this->model = $slider;
    }
}