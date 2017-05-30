<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendDemand*/
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="frontend-product-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'status')->dropDownList(['0' => '删除','1'=>'正常']) ?>

        <?= $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'type')->dropDownList([1=>'快递', 2=>'详细']) ?>

        <?= $form->field($model, 'cataid')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'm_materialid')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'product_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'specification')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'voice')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mem')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'consignee')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php return ; ?>
<?= $form->field($model, 'created_at')->textInput() ?>

<?= $form->field($model, 'updated_at')->textInput() ?>

<?= $form->field($model, 'updated_by')->textInput() ?>