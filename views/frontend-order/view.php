<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendOrder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Order', 'url' => ['index']];
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
                'status',
                'shopid',
                'userid',
                'type',
                'consignee',
                'consignee_cellphone',
                'consignee_address',
                'total_price',
                'origin_price',
                'discounted_price',
                'couponid',
                'trackingid',
                'customer_note',
                'merchant_note',
                'transactionid',
                'm_shippingid',
                'created_at' ,
                'updated_at' ,
        ],
    ]) ?>

</div>
