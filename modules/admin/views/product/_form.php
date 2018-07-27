<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MenuWidget;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
<?php // debug($model); ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php // $form->field($model, 'category_id')->textInput() ?>

    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="product-category_id">Головна категорія</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <option value="0">Самостійна категорія</option>
            <?= MenuWidget::widget(['tpl'=>'select_product', 'model'=>$model])?>

        </select>
    </div>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
<?php
//    echo $form->field($model, 'content')->widget(CKEditor::className(),[
//    'editorOptions' => [
//    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//    'inline' => false, //по умолчанию false
//    ],
//    ]);
?>

    <?php
   echo $form->field($model, 'content')->widget(CKEditor::className(), [
  'editorOptions' => ElFinder::ckeditorOptions(['elfinder', 'path' => 'some/sub/path'],[/* Some CKEditor Options */]),
]);
    ?>



    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>
    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?php //echo $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1', ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
