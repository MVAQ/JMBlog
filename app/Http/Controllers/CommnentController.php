<?php

namespace JMApp\Http\Controllers;

use Illuminate\Http\Request;
use JMApp\Http\Requests;

use JMApp\Comment;
use Auth;
use JMApp\Mspost;
use Validator;

class CommnentController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $request->except('_token','comment_post_id','comment_parent');

        $data = ['mspost_id'] = $request->input('comment_post_id');
        $data = ['parent_id'] = $request->input('comment_parent');

            $validator = Validator::make($data,[
                'mspost_id' => 'integer|required',
                'parent_id'=> 'integer|required',
                'text'=>'string|required'
            ]);
        $validator->sometimes(['name','email'],'required|max:250', function ($input){

            return !Auth::check();
    });
            if($validator->fails()){
                return \Response::json(['error'=>$validator->errors()->all()]);
            }
            $user = Auth::user();
        echo json_encode(['hello'=>'world']);
        exit();
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
