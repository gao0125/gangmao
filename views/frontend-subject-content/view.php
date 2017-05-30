<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendSubjectContent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Subject Content', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-subject-view">
<?php 
        $img=\backend\models\FrontendSubjectContent::find()->select('imgs')->where(['id'=>$model->id])->asArray()->one();
        $image=$img['imgs']==''?'[]':$img['imgs'];
        //var_dump($img);exit();
        $imgs=json_decode($image);
        $ig='';
        foreach ($imgs as $key => $value) {
            $ig.=Html::img('/'.$value, ['width' => 200]).'&nbsp;&nbsp';
        }
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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'subjectid',
            'userid',
            'title',
            'content',
            'imgs'=>[

                'attribute' => 'imgs',
                'label' => '照片',
                'format' => 'raw',
                'value' => $ig,
             ],
            'agree',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
