<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductInspectionDetail */

$this->title = '修改';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Product Inspection Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frontend-product-inspection-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
