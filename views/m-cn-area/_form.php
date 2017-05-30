<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\MCnArea;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\MCnArea*/
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
if(Yii::$app->request->get('cz')=='province'):
    $model->id=MCnArea::find()->max('id')+1;
?>
<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= Html::activeHiddenInput($model,'id',array('value'=>$model->id)) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= Html::activeHiddenInput($model,'pid',array('value'=>0)) ?>
    <?= Html::activeHiddenInput($model,'level',array('value'=>1)) ?>
    
    <?= $form->field($model, 'status')->dropDownList([0=>'关闭', 1=>'开启']) ?>
   <?= $form->field($model, 'is_hot')->dropDownList([0=>'一般', 1=>'热门']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>
<?php 
elseif(Yii::$app->request->get('cz')=='city'):
    $datas=MCnArea::find()->where(['level'=>1])->all();
$datas = ArrayHelper::map($datas ,'id', 'name');
//设置默认值
$model->id=MCnArea::find()->max('id')+1;
?>

<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= Html::activeHiddenInput($model,'id',array('value'=>$model->id)) ?>
    <?= $form->field($model, 'pid')->dropDownList($datas, ['prompt' => '请选择省']) ?>
    <?= $form->field($model, 'name') ?>

    
    
    <?= Html::activeHiddenInput($model,'level',array('value'=>2)) ?>
    <?= $form->field($model, 'status')->dropDownList([0=>'关闭', 1=>'开启']) ?>
   <?= $form->field($model, 'is_hot')->dropDownList([0=>'一般', 1=>'热门']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

<?php 
elseif(Yii::$app->request->get('cz')=='area'):
?>

<?php 
   $datas=MCnArea::find()->where(['level'=>2])->all();
    $datas = ArrayHelper::map($datas ,'id', 'name');
    $model->id=MCnArea::find()->max('id')+1;

?>
<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= Html::activeHiddenInput($model,'id',array('value'=>$model->id)) ?>
    
<?= Html::activeDropDownList($model,'pid', $model->getCityList(0),
[
    'prompt'=>'--请选择省--',
    'onchange'=>'
        $.post("'.yii::$app->urlManager->createUrl('m-cn-area/ajax').'?typeid=1&aid="+$(this).val(),function(data){$("select.mcnarea1").html(data);})']);?>

<?= Html::activeDropDownList($model,'pid',['prompt'=>'--请选择市--'],['class'=>'mcnarea1',]);?>

<?= $form->field($model, 'name') ?>



    <?= Html::activeHiddenInput($model,'level',array('value'=>3)) ?>
    
    <?= $form->field($model, 'status')->dropDownList([0=>'关闭', 1=>'开启']) ?>
   <?= $form->field($model, 'is_hot')->dropDownList([0=>'一般', 1=>'热门']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>
<?php 
else:
?>
<?php 
   $datas=MCnArea::find()->where(['level'=>2])->all();
    $datas = ArrayHelper::map($datas ,'id', 'name');
    $model->id=MCnArea::find()->max('id')+1;

?>
<div class="frontend-product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= Html::activeHiddenInput($model,'id',array('value'=>$model->id)) ?>
    <?= $form->field($model, 'name') ?>
    <?= Html::activeHiddenInput($model,'level',array('value'=>3)) ?>
    
    <?= $form->field($model, 'status')->dropDownList([0=>'关闭', 1=>'开启']) ?>
   <?= $form->field($model, 'is_hot')->dropDownList([0=>'一般', 1=>'热门']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php return ; ?>
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>
<?php 
endif;
?>