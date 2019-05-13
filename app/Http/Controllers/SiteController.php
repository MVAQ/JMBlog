<?php

namespace JMApp\Http\Controllers;
use Illuminate\Http\Request;
use JMApp\Http\Requests;
use JMApp\Repositories\HMenuRepositories;
use Lavary\Menu\Menu;


class SiteController extends Controller
{
   protected $p_rep;            //portpholio_repository
   protected $S_rep;            //slider_repository
   protected $msp_rep;          //mspost_repository
   protected $hm_rep;           //menuBar_repository

    protected $keywords;
    protected $title;
    protected $meta_desc;

   protected $template;         //имя шаблона страницы
   protected $vars=array();     //масив переменных для шаблона
   protected $contentLeftBar;   //контент Left сайтбара
   protected $contentRightBar;  //контент Right сайтбара
   protected $bar='no';        //Ниличие сайтБара

    public function __construct(HMenuRepositories $hm_rep){
        $this->hm_rep = $hm_rep;
    }

    protected function renderOutput(){

        $menu = $this->getHMenu();
        $navigation=view(env('THEME').'.navigation')->with('menu',$menu)->render();//передача экземпляра шаблона верхнего меню
        $this->vars=array_add($this->vars, 'navigation', $navigation);

        if($this->contentRightBar){
            $rightBar = view(env('THEME').'.rightBar')->with('content_rightBar', $this->contentRightBar)->render();
            $this->vars=array_add($this->vars, 'rightBar', $rightBar);
        }

        $footer = view(env('THEME').'.footer')->render();

        $this->vars=array_add($this->vars, 'bar', $this->bar);
        $this->vars=array_add($this->vars, 'footer', $footer);

        $this->vars=array_add($this->vars, 'title', $this->title);
        $this->vars=array_add($this->vars, 'keywords',$this->keywords);
        $this->vars=array_add($this->vars, 'meta_desc', $this->meta_desc);

        return view($this->template)->with($this->vars);
    }
    protected function getHMenu()
    {
        $menu = $this->hm_rep->get();

        $mBilder = \Menu::make('MyNav',function ($mB) use($menu){

            foreach ($menu as $item)
            if ($item->parent == 0){
                $mB->add($item->title,$item->path)->id($item->id);
            }
            else
            {
              if  ($mB->find($item->parent)){
                   $mB->find($item->parent)->add($item->title,$item->path)->id($item->id);
              }
            }
        } );
        return $mBilder;
    }

}
