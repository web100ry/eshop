<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04.05.18
 * Time: 23:46
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;

class CategoryController extends AppController
{
    public function actionIndex() {
       $hits = Product::find()->where(['hit' => '1'])->limit(9)->all();
        //debug($hits);
       return $this->render('index', compact('hits'));

    }
    public function actionView($id){
    $id=Yii::$app->request->get('id');
    //debug($id);
        $products=Product::find()->where(['category_id'=> $id])->all();
 //    debug($products);
     return $this->render('view', compact('products') );
    }
}