<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendProductCommentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'orderid') ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'nickname') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'logistics') ?>

    <?= $form->field($model, 'same') ?>

    <?= $form->field($model, 'delivery') ?>

    <?= $form->field($model, 'service') ?>

    <?= $form->field($model, 'comment') ?>

    <?= $form->field($model, 'imgs') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
