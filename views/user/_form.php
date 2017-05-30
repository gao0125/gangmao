<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <!--    --><?php //
    //    if(! $model->isNewRecord) {
    //        $model->password_hash = '';
    //    }
    //    ?>
    <?= $form->field($model, 'password_hash')->passwordInput() ?>
    <?= $form->field($model, 'status')->dropDownList([ $model::STATUS_DELETED => '禁用', $model::STATUS_ACTIVE => '正常']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
