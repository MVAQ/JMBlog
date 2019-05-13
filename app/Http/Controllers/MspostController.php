<?php

namespace JMApp\Http\Controllers;

use JMApp\Repositories\CommentRepositories;
use JMApp\Repositories\MspostRepositories;
use JMApp\Repositories\PortpholioRepositories;
use JMApp\Categorie;

class MspostController extends SiteController

{
    public function __construct(PortpholioRepositories $p_rep, MspostRepositories $msp_rep, CommentRepositories $c_rep)
    {


        parent::__construct(new \JMApp\Repositories\HMenuRepositories(new \JMApp\HMenu));
        $this->p_rep = $p_rep; //
        $this->msp_rep = $msp_rep;//
        $this->c_rep = $c_rep;//
        $this->bar = 'right';//

        $this->template = env('THEME') . '.msposts';

    }

    public function index($cat_alias = FALSE)
    {


        $msposts = $this->getMspost($cat_alias);
        $content = view(env('THEME') . '.mspost_content')->with('msposts', $msposts)->render();
        $comments = $this->getComments(config('settings.recent_comments'));
        $portpholios = $this->getPortpholios(config('settings.recent_portpholios'));


        $this->contentRightBar = view(env('THEME') . '.mspostBar')->with(['comments' => $comments, 'portpholios' => $portpholios])->render();

        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    public function getComments($take)
    {
        $comments = $this->c_rep->get(['text', 'name', 'email', 'msposts_id', 'user_id'], $take);
        if ($comments) {
            $comments->load('user', 'mspost');
        }
        return $comments;

    }

    public function getPortpholios($take)
    {
        $portpholios = $this->p_rep->get(['title', 'text', 'alias', 'cust', 'imgs', 'filter_alias'], $take);
        return $portpholios;
    }

    public function getMspost($alias = FALSE){
        $where = FALSE;
        if($alias){
            $id = Categorie::select('id')->where('alias',$alias)->first()->id;
            $where = ['category_id',$id];
        }
        $msposts = $this->msp_rep->get(['id', 'title', 'alias', 'created_at', 'imgs', 'description', 'user_id', 'category_id'], FALSE, TRUE,$where);
        if ($msposts) {
            $msposts->load('user', 'categorie', 'comments');
        }
        return $msposts;
    }
    public function show($alias = FALSE){

        $mspost = $this->msp_rep->one($alias, ['comments' => TRUE]);
//        dd($mspost);
        if($mspost){
            $mspost->imgs = json_decode($mspost->imgs);
        }
        $content = view(env('THEME').'.mspost_singl')->with('mspost',$mspost)->render();

        $this->vars = array_add($this->vars,'content', $content);
     //   dd($content);

        $comments = $this->getComments(config('settings.recent_comments'));
        $portpholios = $this->getPortpholios(config('settings.recent_portpholios'));
        $this->contentRightBar = view(env('THEME') . '.mspostBar')->with(['comments' => $comments, 'portpholios' => $portpholios])->render();



        return $this->renderOutput();
    }
}
