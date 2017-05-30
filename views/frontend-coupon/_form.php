<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendCoupon*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'shopid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cataid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_user_levelids')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rest_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'period')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>
    
     <?= $form->field($model, 'started_at', ['inputOptions'=>['placeholder'=>"输入生效日期","onclick"=>"laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"]])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expired_at', ['inputOptions'=>['placeholder'=>"输入失效日期","onclick"=>"laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"]])->textInput(['maxlength' => true]) ?>
 <?= $form->field($model, 'created_at', ['inputOptions'=>['placeholder'=>"输入创建日期","onclick"=>"laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"]])->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>