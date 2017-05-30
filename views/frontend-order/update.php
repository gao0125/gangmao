<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendOrder */

$this->title = '更新订单: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frontend-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

