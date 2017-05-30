<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductImg */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="frontend-product-img-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'location')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '上传' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
