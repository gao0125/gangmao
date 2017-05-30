<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendProductProcessSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'cn_areaid') ?>

    <?= $form->field($model, 'warehouseid') ?>

    <?= $form->field($model, 'cataid') ?>

    <?= $form->field($model, 'm_process_methodid') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'contacts') ?>

    <?= $form->field($model, 'tel') ?>

    <?= $form->field($model, 'product_title') ?>

    <?= $form->field($model, 'specification') ?>

    <?= $form->field($model, 'material') ?>

    <?= $form->field($model, 'weight') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'package') ?>

    <?= $form->field($model, 'imgurls') ?>

    <?= $form->field($model, 'mem') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
