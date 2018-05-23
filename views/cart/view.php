<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="container">

    <?php if(Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                &times;
            </span>
        </button>
        <?=Yii::$app->session->getFlash('success');?>
    </div>
    <?php endif;?>

    <?php if(Yii::$app->session->hasFlash('error')):?>

        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                &times;
            </span>
            </button>
            <?=Yii::$app->session->getFlash('error');?>
        </div>

    <?php endif;?>


    <?php if(!empty($session['cart'])):?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Назва</th>
                    <th>Ціна</th>
                    <th>Кількість</th>
                    <th>Сума</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"</span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($session['cart'] as $id => $item): ?>
                    <tr>
                        <td><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt'=>$item['name'], 'height'=>50])?></td>
                        <td><a href="<?=Url::to(['product/view','id'=>$id])?>"> <?=$item['name']?> </a></td>
                        <td align="center"><?=$item['price']?></td>
                        <td align="center"><?=$item['qty']?></td>
                        <td align="center"><?=$item['qty']*$item['price']?></td>

                        <td><span data-id = "<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"</span></td>
                    </tr>
                <?php endforeach;?>

                <tr>
                    <td colspan="5"><strong>Всього товарів:</strong></td>
                    <td><strong><?= $session['cart.qty']?></strong></td>
                </tr>
                <tr>
                    <td colspan="5"><strong>На загальну суму:</strong></td>
                    <td><strong><?= $session['cart.sum']?></strong></td>
                </tr>

                </tbody>
            </table>
        </div>
        <hr/>
        <?php $form = ActiveForm::begin(); ?>
            <?=$form->field($order, 'name')?>
            <?=$form->field($order, 'email')?>
            <?=$form->field($order, 'phone')?>
            <?=$form->field($order, 'address')?>
        <?= Html::submitButton('Замовити',  ['class' => 'btn btn-success'])?>
        <?php ActiveForm::end();?>

    <?php else: ?>
        <h3>Корзина пуста</h3>
    <?php endif;?>
</div>
