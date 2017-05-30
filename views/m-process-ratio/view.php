<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MProcessRatio */

$this->title = '预览';
$this->params['breadcrumbs'][] = ['label' => 'M Process Ratio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="frontend-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除此项吗?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type'=>[
                'attribute'=>'type',
                'format'=>'raw',
                'value'=>$model->type==0?'基础价格':($model->type==1?'产品类型':($model->type==2?'吨数':($model->type==3?'加工类型数':'平方米路'))),
                
            ],
            'value',
            'ratio',
        ],
    ]) ?>

</div>
