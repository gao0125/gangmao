<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MStandard */

$this->title = '预览';
$this->params['breadcrumbs'][] = ['label' => 'M Standard', 'url' => ['index']];
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
    <?php 
    $name=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
        //     'userid'=>[
        //         'attribute'=>'userid',
        //         'format'=>'raw',
        //         'value'=>$name['nickname'],
                
        //     ],
        //     'filename',
        //     'type',
        //     'size',
        //     'class'=>[
        //         'attribute'=>'class',
        //         'format'=>'raw',
        //         'value'=>$model->class==0?'无安全级别':'仅后台人员可以看',
                
        //     ],
        //     'location',
        ],
    ]) ?>

</div>
