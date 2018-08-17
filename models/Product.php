<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.04.18
 * Time: 21:56
 */

namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    public static function tableName(){
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}