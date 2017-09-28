<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\admin\LaravelGoods;

class GoodsController extends Controller
{
    /*
    *  商品列表页
    */
    public function lst()
    {
        // 获取商品的数据
        $goodsModel = new LaravelGoods();
        $data = $goodsModel->search();
        return view('admin.goodslist',['data'=>$data]);
    }
    /**
     *
     * 添加商品页面
     *
     */
    public function add()
    {
        return view('admin.addgoods');
    }
    /**
     *
     * 商品添加post
     *
     */
    public function addPost(Request $request)
    {
        // 验证规则
        // $this->validate($request,[
        //     'goods_name'=>'required|unique:laravel_goods,goods_name',
        //     'shop_price'=>'required|numeric',

        //     ]);
        // 自定义错误提示(怕英文的看不懂)
        $messages = [
            'required'=>':attribute不能为空',
            'max'=>':attribute不能超过:max',
        ];
        $validator = Validator::make($request->all(),
            ['goods_name'=>'required|max:150',
            'shop_price'=>'required',
            ],$messages);
        if($validator->fails())
        {
            return redirect('admin/addgoods')
                    ->withErrors($validator)
                    ->withInput();
        }

        if($model = LaravelGoods::create($request->all()))
        {
            $info = [
                'msg'=>'你成功了',
                'url' => 'admin/goodslist',
                'time' => '3',
                'status' => true,
            ];
            return redirect('promp')->with('info',$info);
        }
        else
        {
            $info = [
                        'msg'=>'添加商品失败',
                        'url' => 'admin/goodslist',
                        'time' => '3',
                        'status' => false,
                    ];
            return redirect('promp')->with('info',$info);
        }
    }
}
