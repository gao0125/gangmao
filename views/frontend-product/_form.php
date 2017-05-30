<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shopid')->dropDownList(\common\services\Product::getFrontendShopList()) ?>
   
    <?= $form->field($model, 'cataid')->dropDownList(\common\services\Cata::getDropdownList()) ?>
    
    <?= $form->field($model, 'is_recommendation')->dropDownList([0=>'否', 1=>'是']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'f_imgurl')->fileInput()//$form->field($model, 'imgurl')->textInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'm_materialid')->dropDownList(\common\services\Product::getMaterialList()) ?>

    <?= $form->field($model, 'specification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'production_tech')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'standard')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_warehouseid')->dropDownList( \common\services\Product::getWarehouseList()) ?>
<!--    \common\services\Product::getWarehouseList()-->
    <?= $form->field($model, 'manufacturerid')->dropDownList(\common\services\Product::getFrontendManufacturerList()) ?>

    <?= $form->field($model, 'min_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_unitid')->dropDownList(\common\services\Product::getUnitList()) ?>
    
    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>