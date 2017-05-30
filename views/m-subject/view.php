<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MSubject */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'M Subject', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '是否确定要删除?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'type'=>[
                'attribute'=>'type',
                'format'=>'raw',
                'value'=>$model->type==0?'每日多次':($model->type==1?'每日只能一次':'只有一次'),
                
            ],
            'val',
            'class'=>[
                'attribute'=>'class',
                'format'=>'raw',
                'value'=>$model->class==0?'积分相关':'余额相关',
            ],
        ],
    ]) ?>

</div>
