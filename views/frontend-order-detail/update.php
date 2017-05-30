<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendOrderDetail */

$this->title = '更新订单: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Order Detail', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'orderid' => $model->title]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frontend-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
