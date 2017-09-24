<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\admin\LaravelShop;

class GoodsController extends Controller
{
    /*
    *  商品列表页
    */
    public function lst()
    {
        // 获取商品的数据
        $goodsModel = new LaravelShop();
        $data = $goodsModel->all();
        return view('admin.goodslist',['data'=>$data]);
    }
    
    
    
    
    /**
     *
     * 添加商品
     *
     */
    public function add()
    {
        return view('admin.addgoods');
    }
}
