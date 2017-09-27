<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\model\admin\LaravelGoods;
use Illuminate\Http\Request;

class GoodsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /* 相当于before_insert方法 */
        LaravelGoods::saving(function ($data)
        {
            // 自动生成添加时间和上架
            $data['addtime'] = date('Y-m-d H:i:s',time());
            $data['is_on_sale'] = '是';
            // 处理图片
            $request = request();
            if($file = $request->file('logo'))
            {
                if($file->isValid())
                {
                // 检查上传是否出错
                    // 设置文件名和存储路径
                    $strTime = strftime('%G-%m-%e',time());
                    $fileName = $strTime.'-'.$file->getClientOriginalName();
                    $filePath = 'uploads/'.'Goods/'.$strTime.'/';
                    $newFile = $file->move($filePath,$fileName);
                    // 存储图片路径
                    $data['logo'] = $filePath.$fileName;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
