<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16.04.18
 * Time: 22:49
 */

namespace app\assets;
use yii\web\AssetBundle;

class AppLtAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [

        'js/html5shiv.js',
        'js/respond.min.js',
    ];
    public $jsOptions = [
      'condition' => 'lte IE9',
        'position' => \yii\web\View::POS_HEAD
    ];
}