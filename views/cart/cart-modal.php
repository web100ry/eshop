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
            <td><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt'=>$item['name'])?></td>
            <td><?=$item['name']?></td>
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
<?php else: ?>
<h3>Корзина пуста</h3>
<?php endif;?>