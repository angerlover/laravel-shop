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

}
