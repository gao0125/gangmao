<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use backend\models\MCnArea;
/* @var $this yii\web\View */
/* @var $model backend\models\MCnArea */
//$a=MCnArea::find('name')->where(['id' => $model->pid]);
$name=Yii::$app->db->createCommand('SELECT * FROM m_cn_area where id='.(($model->pid)==0?($model->id):($model->pid)))->queryOne();

$this->title = $name['name'];
$this->params['breadcrumbs'][] = ['label' => 'M Cn Area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a('返回', ['index'], ['style'=>'float:right','class' => 'btn btn-primary']) ?><div class="frontend-product-view">

    <h1> 附属： <?= Html::encode($this->title) ?></h1>

   
    <?php 
        //$pp=Yii::$app->db->createCommand('SELECT * FROM m_cn_area where pid='.$model->id)->queryAll();
        
    ?>
     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                'id' ,
                'name',
                [
                    'attribute'=>'pid',
                    'value'=>$name['name'],
                ],
                'level',
                [
                    'attribute'=>'status',
                    'value'=>$model->status==1?'开启':'关闭',
                ],
                [
                    'attribute'=>'is_hot',
                    'value'=>$model->is_hot==1?'热门':'一般',
                ],
        ],
        
    ]) ?>







    
</div>
