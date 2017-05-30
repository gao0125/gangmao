<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Feedback */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Feedback', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除此项吗?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回', ['index','sort'=>'-id'], ['style'=>'float:right','class' => 'btn btn-primary']) ?>
    </p>

    <?php
        $fif=\backend\models\Feedback::find()->select('imgs')->where(['id'=>$model->id])->asArray()->one();
        $eie=json_decode($fif['imgs']);
        $va='';
        foreach ($eie as $key => $value) {
            $va.=Html::img('/'.$value, ['width' => 150]).'&nbsp;&nbsp';
        }
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userid',
            'name',
            'tel',
            'email:email',
            'brief',
            'content:ntext',
            [
                'attribute' => 'imgs',
                'label' => '照片',
                'format' => 'raw',
                'value' => $va,
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
