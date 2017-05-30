<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendAdContent*/
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="frontend-product-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        //dropDownList(\common\services\Product::getFrontendAdList())
        <?= $form->field($model, 'adid')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'content')->fileInput() ?>

        <?= $form->field($model, 'content_type')->dropDownList([0 => '图片']) ?>

        <?= $form->field($model, 'type')->dropDownList([1=>'产品', 2=>'普通url', 3=>'消息']) ?>

        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php return ; ?>
<?= $form->field($model, 'created_at')->textInput() ?>

<?= $form->field($model, 'updated_at')->textInput() ?>

<?= $form->field($model, 'updated_by')->textInput() ?>