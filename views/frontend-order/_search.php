<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'shopid') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'consignee') ?>

    <?= $form->field($model, 'consignee_cellphone') ?>

    <?= $form->field($model, 'consignee_address') ?>

    <?= $form->field($model, 'total_price') ?>

    <?= $form->field($model, 'origin_price') ?>

    <?= $form->field($model, 'discounted_price') ?>

    <?= $form->field($model, 'couponid') ?>

    <?= $form->field($model, 'trackingid') ?>

    <?= $form->field($model, 'customer_note') ?>

    <?= $form->field($model, 'merchant_note') ?>

    <?= $form->field($model, 'transactionid') ?>

    <?= $form->field($model, 'm_shippingid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
