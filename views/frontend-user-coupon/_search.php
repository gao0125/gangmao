<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendUserCouponSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'couponid') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'shopid') ?>

    <?= $form->field($model, 'cataid') ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'discount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
