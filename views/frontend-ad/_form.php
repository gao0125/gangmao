<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendAd*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'plantform')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sectionid')->dropDownList([1=>'首页', 2=>'列表', 3=>'新闻']) ?>

    <?= $form->field($model, 'status')->dropDownList([0=>'下线', 1=>'在线']) ?>

    <?= $form->field($model, 'type')->dropDownList([0 => 'banner',1=>'set banner']) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>