<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\model\admin\LaravelGoods;
use Illuminate\Http\Request;
use Image;

class GoodsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()0
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
                    $file->move($filePath,$fileName);
                    // 存储图片路径
                    $logoPath = $filePath.$fileName;
                    $data['logo'] = $logoPath;
                    // 制作缩略图
                    $small_logo = $filePath.'samll_'.$fileName;
                    $mid_logo = $filePath.'mid_'.$fileName;
                    $big_logo = $filePath.'big_'.$fileName;

                    Image::make($logoPath)->resize(80,80)->save($filePath.'samll_'.$fileName);
                    Image::make($logoPath)->resize(500,500)->save($filePath.'mid_'.$fileName);
                    Image::make($logoPath)->resize(800,800)->save($filePath.'big_'.$fileName);

                    // 存入数据库
                    $data['small_logo'] = $small_logo;
                    $data['mid_logo'] = $mid_logo;
                    $data['big_logo'] = $big_logo;
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
