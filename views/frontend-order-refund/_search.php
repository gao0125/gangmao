<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendOrderRefundSearch */
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

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'num') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'reason') ?>

    <?= $form->field($model, 'explain') ?>

    <?php // echo $form->field($model, 'specification') ?>

    <?php // echo $form->field($model, 'production_tech') ?>

    <?php // echo $form->field($model, 'standard') ?>

    <?php // echo $form->field($model, 'm_warehouseid') ?>

    <?php // echo $form->field($model, 'manufacturerid') ?>

    <?php // echo $form->field($model, 'min_quantity') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'unitid') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
