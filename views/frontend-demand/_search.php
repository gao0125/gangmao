<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendDemandSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'cataid') ?>

    <?= $form->field($model, 'm_materialid') ?>

    <?= $form->field($model, 'product_title') ?>

    <?= $form->field($model, 'specification') ?>

    <?= $form->field($model, 'quantity') ?>

    <?= $form->field($model, 'voice') ?>

    <?= $form->field($model, 'mem') ?>

    <?= $form->field($model, 'consignee') ?>

    <?= $form->field($model, 'cellphone') ?>

    <?= $form->field($model, 'address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
