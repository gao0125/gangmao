<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendDelivery */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Delivery', 'url' => ['index']];
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
//                'id' ,
//                'userid',
//                'loading_point',
//                'orderid',
//               'unloading_point' ,
//                'status' ,
//                'cataid' ,
//                'weight' ,
//                'distance' ,
//                'price' ,
//
//                'created_at' ,
//                'updated_at' ,
            'id'   ,
            'userid',
            'orderid',
            'status' ,
            'consignee',
            'address',
            'total_price',
            'created_at' ,
            'updated_at',
            'tel'
        ],
    ]) ?>

</div>
