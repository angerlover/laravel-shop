<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PrompController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = session()->all();
        //dd($sessions['info']['msg']);
        // 设置跳转需要的数据
        $data = null;
        if(!empty($sessions['info']['msg']) && !empty($sessions['info']['url']) && !empty($sessions['info']['time']))
        {
            $data = 
                    [
                        'msg'=>$sessions['info']['msg'],
                        'url'=>$sessions['info']['url'],
                        'time'=>$sessions['info']['time'],
                        'status'=>$sessions['info']['status'],
                    ];

            return view('promp',['data'=>$data]);
        }
        else
        {
            $data = [
                'msg'=>'非法访问！',
                'url'=>'/',
                'time'=>'3',
                'status'=>false,
            ];

        }
        return view('promp',['data'=>$data]);
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
