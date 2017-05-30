<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\MWarehouse*/
/* @var $form yii\widgets\ActiveForm */

?>
<?php 
if(Yii::$app->request->getPathInfo()=='m-warehouse/update'):
?>
<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= Html::activeHiddenInput($model,'updated_by',array('value'=>Yii::$app->user->identity->id)) ?>

    <div class="form-group">
        <?= Html::submitButton( '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>


    ///////////////////
<?php 
endif;
?>
<div class="frontend-product-form">
            <!--省市两级联动开始-->
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= Html::activeDropDownList($model,'m_cn_areaid', $model->getCityList(0),
    [
        'prompt'=>'--请选择省--',
        'onchange'=>'
            $.post("'.yii::$app->urlManager->createUrl('m-cn-area/ajax').'?typeid=1&aid="+$(this).val(),function(data){$("select.mcnarea1").html(data);})']);?>

<?= Html::activeDropDownList($model,'m_cn_areaid',['prompt'=>'--请选择市--'],['class'=>'mcnarea1',]);?>
            <!--省市两级联动结束-->
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= Html::activeHiddenInput($model,'updated_by',array('value'=>Yii::$app->user->identity->id)) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>