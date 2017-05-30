<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\MWarehouse */

$this->title = '预览';
$this->params['breadcrumbs'][] = ['label' => 'M Warehouse', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$name=\backend\models\User::find()->select('username')->where('id=:updated_by',[':updated_by'=>$model->updated_by])->asArray()->one();
$a=\backend\models\MCnArea::find()->where(['id'=>$model->m_cn_areaid])->all();
//$a=\backend\models\MCnArea::findAll(array('id'=>$model->m_cn_areaid)); 
$b=ArrayHelper::map($a, 'id', 'pid');
// $model=new MCnArea();
$cname=\backend\models\MCnArea::find()->where(['id' =>$b[$model->m_cn_areaid] ])->asArray()->one();
//var_dump($c);
?>
<div class="frontend-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '是否确定删除此项?',
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
                'value'=>$name['username'],
                
            ],
            'm_cn_areaid'=>[
                'attribute'=>'m_cn_areaid',
                'format'=>'raw',
                'value'=>$cname['name'],
                
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
