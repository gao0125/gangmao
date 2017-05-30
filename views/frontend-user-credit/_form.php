<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendUserCredit*/
/* @var $form yii\widgets\ActiveForm */
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
<?php 
$name=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();

?>
<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'userid')->textInput(['disabled'=>'disabled','maxlength' => true,'value'=>$name['nickname']]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>