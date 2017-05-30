<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendOrder*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'status')->dropDownList([1=>'待支付', 2=>'已支付/未确认', 3=>'线下支付', 4=>'已确认/待发货', 5=>'已发货/转运中(快递单号)', 9=>'已完成', 10=>'部分退货', 11=>'全单退货', 99=>'非正常单']) ?>

    <?= $form->field($model, 'shopid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consignee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consignee_cellphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consignee_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'origin_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discounted_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'couponid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trackingid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'merchant_note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transactionid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_shippingid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>