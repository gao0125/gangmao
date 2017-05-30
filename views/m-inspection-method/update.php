<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MInspectionMethod */

$this->title = '修改检验方式' ;
$this->params['breadcrumbs'][] = ['label' => 'M Inspection Method', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="frontend-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
