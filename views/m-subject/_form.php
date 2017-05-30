<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MSubject*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->dropDownList([0=>'每日多次', 1=>'每日只能一次',2=>'只有一次']) ?>   
    <?= $form->field($model, 'val') ->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'class')->dropDownList([0=>'积分相关', 1=>'余额相关']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>