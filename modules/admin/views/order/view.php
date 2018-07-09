<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Замовлення №<?= $model->id ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
         //   'status',
            [
                    'attribute'=>'status',
                'value' => !$model->status ? '<span class="text-danger">Активний</span>' : '<span class="text-success">Завершено</span>',
                'format'=>'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>
<?php $items=$model->orderItems; ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>

                <th>Назва</th>
                <th>Ціна</th>
                <th>Кількість</th>
                <th>Сума</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"</span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><a href="<?=Url::to(['/product/view','id'=>$item->product_id])?>"> <?=$item['name']?> </a></td>
                    <td align="center"><?=$item['price']?></td>
                    <td align="center"><?=$item['qty_item']?></td>
                    <td align="center"><?=$item['sum_item']?></td>

                 </tr>
            <?php endforeach;?>


            </tbody>
        </table>
    </div>
</div>
