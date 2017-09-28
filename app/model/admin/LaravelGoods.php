<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaravelGoods extends Model
{
    protected $table = 'laravel_goods';
    public $timestamps = false;
    protected $primaryKey = 'id';

    // 设置软删除为日期格式
    protected $dates = ['deleted_at'];

    protected $fillable = ['goods_name','shop_price','goods_desc','market_price'];


    /**
     * 搜索方法
     */
    public function search()
    {
    	$request = request();
    	$data = [];
    	$where = [];
    	// 商品名称
    	// $goodsName = !empty($request->goods_name) ? $request->goods_name : '';
    	// $fTime = $request->ftime ? $request->ftime : '';
    	// $tTime = $request->ttime ? $request->ttime : '';
    	// return $this->where('goods_name','like',"%$goodsName%")
    	// 			->where(function ($query) use($fTime,$tTime){
    	// 				if($fTime)
    	// 				{
    	// 					$query->where('addtime','>=',$fTime);
    	// 				}
    	// 				if($tTime)
    	// 				{
    	// 					$query->where('addtime','<=',$tTime);
    	// 				}
    	// 			})
    	// 			->get();

    	$q = self::query();
    	
    	if($goodsName = $request->goods_name)
    	{
    		$q->where('goods_name','like',"%$goodsName%");
    	}
    	if($fTime = $request->ftime)
    	{
    		$q->where('addtime','>=',$fTime);
    	}
    	if($tTime = $request->ttime)
    	{
    		$q->where('addtime','<=',$tTime);
    	}
    	return $q->get();
  		
    }

}
