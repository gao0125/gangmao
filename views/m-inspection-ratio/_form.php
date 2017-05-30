<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MInspectionRatio*/
/* @var $form yii\widgets\ActiveForm */
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'type')->dropDownList([0=>'每日工时',1=>'产品类型',2=>'吨数',3=>'检验方式系',4=>'检验机构']) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ratio')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>