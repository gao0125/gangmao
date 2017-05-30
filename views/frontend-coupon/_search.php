<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendCouponSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shopid') ?>

    <?= $form->field($model, 'cataid') ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'm_user_levelids') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'discount') ?>

    <?= $form->field($model, 'num') ?>

    <?= $form->field($model, 'rest_num') ?>

    <?= $form->field($model, 'period') ?>

    <?= $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
