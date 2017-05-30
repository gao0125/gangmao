<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductImg */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Product Imgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-img-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /*Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'attribute'=>'url',
            'value'=> Yii::$app->request->getHostInfo() . '/' . $model->url,
            'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'id',
            'productid',
            'pos',
            'hash',
            'filename',
            'filetype',
            'size',
            'location',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
