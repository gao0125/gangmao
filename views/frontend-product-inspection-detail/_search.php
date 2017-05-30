<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendProductInspectionDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-inspection-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_inspectionid') ?>

    <?= $form->field($model, 'cataid') ?>

    <?= $form->field($model, 'product_title') ?>

    <?= $form->field($model, 'product_standard') ?>

    <?php // echo $form->field($model, 'm_materialid') ?>

    <?php // echo $form->field($model, 'specification') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'm_inspectionid') ?>

    <?php // echo $form->field($model, 'm_inspection_methods') ?>

    <?php // echo $form->field($model, 'imgs') ?>

    <?php // echo $form->field($model, 'mem') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
