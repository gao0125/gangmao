<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendNews*/
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="frontend-product-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'cataid')->dropDownList(\common\services\Cata::getDropdownList()) ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ico')->fileInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
            'clientOptions' => [
                'imageManagerJson' => ['/redactor/upload/image-json', 'redactor_img_src' => 'product/desc'],
                'imageUpload' => ['/redactor/upload/image', 'redactor_img_src' => 'product/desc'],
                'fileUpload' => ['/redactor/upload/file', 'redactor_img_src' => 'product/desc'],
                'lang' => 'zh_cn',
                'plugins' => ['clips', 'fontcolor','imagemanager', 'table','video']
            ]]) ?>
        <?= $form->field($model, 'cnt')->textInput(['maxlength' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php return ; ?>
<?= $form->field($model, 'created_at')->textInput() ?>

<?= $form->field($model, 'updated_at')->textInput() ?>

<?= $form->field($model, 'updated_by')->textInput() ?>