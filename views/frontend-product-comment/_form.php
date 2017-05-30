<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductComment */
/* @var $form yii\widgets\ActiveForm */
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
<?php 
$ab=\common\services\Product::getFrontendProductList();

?>
<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'orderid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productid')->dropDownList($ab) ?>

    

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->dropDownList([1=>'好',2=>'中',3=>'差']) ?>

    <?= $form->field($model, 'logistics')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'same')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imgs')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>