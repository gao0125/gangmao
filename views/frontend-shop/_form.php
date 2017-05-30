<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendShop*/
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="frontend-product-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'logo')->fileInput() ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList([0=>'待审核', 1=>'已审核', 2=>'已认证', 3=>'黑名单']) ?>

        <?= $form->field($model, 'banner')->fileInput() ?>

        <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sphere')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php return ; ?>
<?= $form->field($model, 'created_at')->textInput() ?>

<?= $form->field($model, 'updated_at')->textInput() ?>

<?= $form->field($model, 'updated_by')->textInput() ?>