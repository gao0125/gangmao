<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProduct */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'shopid',
            'cataid',
            'is_recommendation',
            'title',
            'imgurl:url',
            'm_materialid',
            'specification',
            'production_tech',
            'standard',
            'm_warehouseid',
            'manufacturerid',
            'min_quantity',
            'quantity',
            'price',
            'm_unitid',
            'created_at',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
