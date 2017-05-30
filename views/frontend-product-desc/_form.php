<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductDesc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-desc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productid')->hiddenInput(['maxlength' => true, 'value' => $productid]) ?>

    <?= $form->field($model, 'type')->dropDownList([1=>'移动', 2=>'pc']) ?>
    
    <?= $form->field($model, 'section')->dropDownList([1=>'基本介绍', 2=>'规格参数', 3=>'售后服务']) ?>

    <?= $form->field($model, 'desc')->widget(\yii\redactor\widgets\Redactor::className()) ?>
 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
