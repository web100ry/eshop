<?php


namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use Yii;

/*Array
(
    [1] => Array
    (
        [qty] => QTY
        [name] => NAME
        [price] => PRICE
        [img] => IMG
    )
    [10] => Array
    (
        [qty] => QTY
        [name] => NAME
        [price] => PRICE
        [img] => IMG
    )
)
    [qty] => QTY,
    [sum] => SUM
);*/
class CartController extends AppController{

    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
    //    debug($product);
      if(empty($product)) return false;
      $session =Yii::$app->session;
      $session->open();
      $cart = new Cart();
      $cart->addToCart($product);
      $this->layout=false;
//   debug($_SESSION['cart']);
//      debug($_SESSION['cart.qty']);
//      debug($_SESSION['cart.sum']);
  return $this->render('cart-modal', compact('session'));

    }

} 