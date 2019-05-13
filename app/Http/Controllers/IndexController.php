<?php

namespace JMApp\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JMApp\Http\Requests;
use JMApp\Repositories\HMenuRepositories;
use JMApp\Repositories\MspostRepositories;
use JMApp\Repositories\SliderRepositorys;
use Config;
use JMApp\Repositories\PortpholioRepositories;
class IndexController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(SliderRepositorys $s_rep, PortpholioRepositories $p_rep, MspostRepositories $msp_rep){

        parent::__construct( new \JMApp\Repositories\HMenuRepositories(new \JMApp\HMenu));
        $this->s_rep = $s_rep;
        $this->p_rep = $p_rep;
        $this->msp_rep = $msp_rep;
        $this->bar = 'right';
        $this->template =env('THEME').'.index';


    }

    public function index(){

        $portpholios = $this->getPortpholio();
        $content = view(env('THEME').'.content')->with('portpholios', $portpholios)->render();
        $this->vars = array_add($this->vars,'content', $content);

        $sliderItems = $this->getSliders();
        $sliders= view(env('THEME').'.slider')->with('sliders',$sliderItems)->render();
        $this->vars = array_add($this->vars,'sliders',$sliders);

        $msposts = $this->getMsposts();
        $this->contentRightBar = view(env('THEME').'.indexbar')->with('msposts', $msposts)->render();

        $this->meta_desc = 'Home Page';
        $this->keywords = 'Home Page';
        $this->title = 'Home Page';

        return $this->renderOutput();
    }

    protected function getPortpholio(){

        $portpholio=$this->p_rep->get('*',Config::get('settings.home_port_count'));
        return $portpholio;
    }
    protected function getMsposts(){

        $msposts=$this->msp_rep->get(['title','created_at','imgs','alias'],Config::get('settings.home_posts_count'));
        return $msposts;
    }

    public function getSliders(){

        $sliders = $this->s_rep->get();

        if($sliders->isEmpty()){
            return FALSE;
        }
        $sliders->transform( function ($item, $key){

            $item->img = Config::get('settings.slider_path').'/'.$item->img;
            return  $item;

        });
            return $sliders;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
