<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendCata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-cata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pid')->dropDownList(\common\services\Cata::getDropdownList()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
var dropDownList = '<select id="frontendcata-pid" class="form-control" name="FrontendCata[pid]"><option value="0">root</option></select>';

function getSubCata($id = 0){
        $.ajax({
          type: 'POST',
          url: '<?=Yii::$app->urlManager->createUrl('frontend-cata/get-sub-cata')?>',
          data: { id: $id },
          dataType: 'json',
          timeout: 300,
          context: $('body'),
          success: function(data){
            // Supposing this JSON payload was received:
            //   {"project": {"id": 42, "html": "<div>..." }}
            // append the HTML to context object.
            this.append(data.project.html)
          },
          error: function(xhr, type){
            alert('Ajax error!')
          }
        });
}
</script>