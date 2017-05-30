<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendOrderInvoiceSearch */
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

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'duty_paragraph') ?>

    <?= $form->field($model, 'bank') ?>

    <?= $form->field($model, 'bank_account') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'tel') ?>

    <?= $form->field($model, 'consignee') ?>

    <?= $form->field($model, 'consignee_tel') ?>

    <?= $form->field($model, 'zip_code') ?>

    <?= $form->field($model, 'fax') ?>

    <?= $form->field($model, 'consignee_address') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
