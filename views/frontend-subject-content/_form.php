<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendSubjectContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-subject-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'subjectid')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'imgs')->fileInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'agree')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
