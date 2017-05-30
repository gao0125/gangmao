<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendProductComment */

$this->title = '预览';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Product Comment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
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
    <?php
        $fwf=\backend\models\FrontendProductComment::find()->select('imgs')->where(['id'=>$model->id])->asArray()->one();
        $efe=json_decode($fwf['imgs']);
        $val='';
        foreach ($efe as $key => $value) {
            $val.=Html::img('/'.$value, ['width' => 200]).'&nbsp;&nbsp';
        }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'orderid',
            'productid',
            'userid'=>[
                'attribute'=>'userid',
                'format'=>'raw',
                'value'=>$name['nickname'],
                
            ],
            'nickname',
            'level'=>[
                'attribute'=>'level',
                'format'=>'raw',
                'value'=>$model->level==1?'好':($model->level==2?'中':'差'),
                
            ],
            'logistics',
            'same',
            'delivery',
            'service',
            'comment',
            'imgs'=>[

                'attribute' => 'imgs',
                'label' => '照片',
                'format' => 'raw',
                'value' => $val,
             ],

            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
