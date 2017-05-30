<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendSubject */
/* @var $form yii\widgets\ActiveForm */
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
<div class="frontend-subject-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pid')->dropDownList(\common\services\Subject::getDropdownList()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ico')->fileInput(['maxlength' => true]) ?>
    <?php 
    	if($model->isNewRecord):
    ?>
    
    <?= Html::activeHiddenInput($model,'created_by',array('value'=>Yii::$app->user->identity->id)) ?>
    <?php 
    endif;
    ?>
    <?= Html::activeHiddenInput($model,'updated_by',array('value'=>Yii::$app->user->identity->id)) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
