<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FrontendSubjectContentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-subject-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'subjectid') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'content') ?>
    <?= $form->field($model, 'imgs') ?>
    <?= $form->field($model, 'agree') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'depth') ?>

    <?php // echo $form->field($model, 'route') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
