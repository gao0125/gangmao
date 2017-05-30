<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendSubjectComment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Subject Comment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-subject-view">
<?php 
$name=\backend\models\FrontendSubjectContent::find()->select('content')->where('id=:subject_contentid',[':subject_contentid'=>$model->subject_contentid])->asArray()->one();
$uname=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除此项吗?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回', ['index'], ['style'=>'float: right','class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'subject_contentid'=>[
                'attribute'=>'subject_contentid',
                'format'=>'raw',
                'value'=>$name['content'],
                
            ],
            'userid'=>[
                'attribute'=>'userid',
                'format'=>'raw',
                'value'=>$uname['nickname'],
                
            ],
            'comment',
            'agree',
//            'created_by',
//            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
