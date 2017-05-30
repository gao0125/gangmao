<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendUserCompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'duty_paragraph') ?>

    <?= $form->field($model, 'bank') ?>

    <?= $form->field($model, 'back_account') ?>

    <?= $form->field($model, 'refund_bank') ?>

    <?= $form->field($model, 'refund_bank_account') ?>

    <?= $form->field($model, 'tel') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
