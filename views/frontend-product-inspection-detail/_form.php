<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductInspectionDetail */
/* @var $form yii\widgets\ActiveForm */
?>
<?= Html::a('返回', ['index','piid'=>$model->product_inspectionid], ['style'=>'float: right','class' => 'btn btn-primary']) ?>
<div class="frontend-product-inspection-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'status')->dropDownList([0=>'删除', 1=>'正常订单',2=>'已支付',4=>'已确认']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
