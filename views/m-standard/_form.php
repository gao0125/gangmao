<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MStandard*/
/* @var $form yii\widgets\ActiveForm */
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <!-- <? /*$form->field($model, 'userid')->textInput(['maxlength' => true])*/ ?>
    <? /*$form->field($model, 'hash')->passwordInput(['maxlength' => true])*/ ?>
    <? /*$form->field($model, 'filename')->textInput(['maxlength' => true])*/ ?>
    <? /*$form->field($model, 'type')->textInput(['maxlength' => true])*/ ?>
    <? /*$form->field($model, 'location')->textInput(['maxlength' => true])*/ ?>
    <? /*$form->field($model, 'size')->textInput(['maxlength' => true])*/ ?>
    <? /*$form->field($model, 'class')->textInput(['maxlength' => true])*/ ?>
 -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>