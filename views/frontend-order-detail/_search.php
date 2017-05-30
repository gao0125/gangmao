<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendOrderDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'orderid') ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'specification') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'num') ?>

    <?= $form->field($model, 'unit_name') ?>

    <?= $form->field($model, 'subtotal') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
