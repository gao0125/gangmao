<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendInfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Info', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-view">

    <h1>预览: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <a style="float:right" class="btn btn-primary" href="<?php echo Yii::$app->request->getHostInfo().Yii::$app->user->returnUrl.'/frontend-info/index?sort=-id';?>">返回</a>
    </p>

    <?php 
    
        $ff=Yii::$app->request->get('id');
        $dd = Yii::$app->db->createCommand("SELECT * FROM frontend_info WHERE id='{$ff}'")
           ->queryOne();

    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['attribute'=>'code','value'=>$dd['code']],
            ['attribute'=>'content' , 'format' => 'html','value'=>$dd['content']],
            'created_at' ,
            'updated_at' ,
        ],
    ]) ?>

</div>
