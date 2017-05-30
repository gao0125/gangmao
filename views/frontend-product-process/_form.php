<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductProcess */
/* @var $form yii\widgets\ActiveForm */
?>
    <div class="frontend-product-form">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'orderid')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'contacts')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'status')->dropDownList([0=>'待审核', 1=>'已审核']) ?>
        <?= $form->field($model, 'mem')->textInput(['maxlength' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
<?php return ; ?>
<?= $form->field($model, 'created_at')->textInput() ?>
<?= $form->field($model, 'updated_at')->textInput() ?>
<?= $form->field($model, 'updated_by')->textInput() ?>