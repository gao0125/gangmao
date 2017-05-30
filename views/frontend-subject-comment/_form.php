<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendSubjectComment */
/* @var $form yii\widgets\ActiveForm */
?>
<?= Html::a('返回', ['index'], ['style'=>'float: right','class' => 'btn btn-primary']) ?>
<div class="frontend-subject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject_contentid')->dropDownList(\common\services\Subject::getSubjectContentList()) ?>
    <?= $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'agree')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
