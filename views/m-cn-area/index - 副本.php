<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\MCnArea;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MCnAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '区域管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(!empty(Yii::$app->request->get('gid'))):?>
<a style="float:right" class="btn btn-primary" href="<?php echo Yii::$app->request->getHostInfo().Yii::$app->user->returnUrl.'/m-cn-area/index';?>">返回</a>
<?php endif;?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
        $gid =empty(Yii::$app->request->get('gid'))?0:(Yii::$app->request->get('gid')) ;
        //查询当页数据下级有没有数据
        $sql= "SELECT * FROM m_cn_area where pid=".$gid;  
        $rows=Yii::$app->db->createCommand($sql)->queryOne();
        $count=MCnArea::find()->andWhere(['pid'=>$rows['id']])->count('id');
    ?>

    <?php 
    /*用if判断管理操作显不显示*/
    if($count!=0):
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'pid',
            'level',
            //'status',
            //'is_hot',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'操作',
                'headerOptions'=>['width'=>'70']],
         
            [
                'label'=>'区域管理',
                'format'=>'raw',
                'value' => function($data){
                    $url = \yii\helpers\Url::to(['m-cn-area/index', 'gid' => $data->id]);
                    return Html::a('管理', $url, ['title' => '区域管理']);
                }
            ]
        ],
    ]); ?>
    <?php 
    else:
    ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'pid',
            'level',
            //'status',
            //'is_hot',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'操作',
                'headerOptions'=>['width'=>'70']],
         
            
        ],
    ]); ?>
    <?php 
    endif;
    ?>
   
</div>
