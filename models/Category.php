<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17.04.18
 * Time: 21:56
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord{

    public static function tableName(){
        return 'category' ;
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}