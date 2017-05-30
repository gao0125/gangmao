<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendProductInspectionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'orderid') ?>

    <?= $form->field($model, 'tel') ?>

    <?= $form->field($model, 'total_price') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'imgs') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>
<!---->
<!--    --><?//= $form->field($model, 'm_inspection_methods') ?>
<!---->
<!--    --><?//= $form->field($model, 'mem') ?>
<!---->
<!--    --><?//= $form->field($model, 'price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
