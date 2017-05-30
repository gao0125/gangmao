<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MMaterial */

$this->title = '预览';
$this->params['breadcrumbs'][] = ['label' => 'MMaterial', 'url' => ['index']];
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
            'name',
            'updated_by'=>[
                'attribute'=>'updated_by',
                'format'=>'raw',
                'value'=>(\backend\models\User::find()->select('username')->where('id=:updated_by',[':updated_by'=>$model->updated_by])->asArray()->one()['username']),
                
            ],
        ],
    ]) ?>

</div>
