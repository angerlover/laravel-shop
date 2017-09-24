<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class LaravelShop extends Model
{
    protected $table = 'laravel_goods';
    public $timestamp = false;
    protected $primaryKey = 'id';

}
