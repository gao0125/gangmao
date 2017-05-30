<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MProcessRatio */

$this->title = '修改加工系数: ' ;
$this->params['breadcrumbs'][] = ['label' => 'M Process Ratio', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frontend-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
