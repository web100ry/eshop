<?php

namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public function addToCart($product, $qty = 1)
    {

        if ($_SESSION['cart'][$product->id] <> null) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;

        } else {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'img' => $product->img,
                'price'=> $product->price
            ];
        }

   if (isset($_SESSION['cart.qty'])){$_SESSION['cart.qty'] += $qty;
   }else{
       $_SESSION['cart.qty']= $qty;
   }

 // $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum']+$qty*$product->price : $qty*$product->price;

        if (isset($_SESSION['cart.sum'])){$_SESSION['cart.sum'] += $qty*$product->price;
        }else{
            $_SESSION['cart.sum']= $qty*$product->price;
        }

    }
}