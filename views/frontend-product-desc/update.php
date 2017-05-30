<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductDesc */

$this->title = 'Update Frontend Product Desc: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Product Descs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frontend-product-desc-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
        'productid' => $model->productid
    ]) ?>

</div>
