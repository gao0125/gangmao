<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendProductCommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品评论';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'orderid',
            'productid'=>[
                'attribute'=>'productid',
                'format'=>'raw',
                'value'=>function($model){
                    $sname=\backend\models\FrontendProduct::find()->select('title')->where('id=:productid',[':productid'=>$model->productid])->asArray()->one();
                    return $sname['title'];
                },
                'filter' =>\common\services\Product::getFrontendProductList(),
                
            ],
            'userid'=>[
                'attribute'=>'userid',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
                    return $name['nickname'];
                },
                'filter' =>\backend\models\FrontendProductComment::getUserList(),
            ],
            'nickname',
            [
                'attribute'=>'level',
                
                'value' => function($model){
                    switch($model->level)
                    {
                        case 1:
                            return "好";
                            break;
                        case 2:
                            return "中";
                            break;
                            case 3:
                            return "差";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'level',
                    \backend\models\FrontendProductComment::$level, ['class' => 'form-control'])
            ],
            'logistics',
            'same',
            'delivery',
            'service',
            'comment'=>[
                'attribute'=>'comment',
                'format'=>'raw',
                'value'=>function($model){
                    if(strlen($model->comment)>18){
                       return mb_substr($model->comment,0,15,'utf-8').'.....';
                    }else{
                        return $model->comment;
                    }
                },
                
            ],
            // [
            //     'attribute'=>'imgs',
            //     'value'=>function($model){
            //         return $model->imgs;
            //     },
            //     'format' => ['image',['width'=>'100']],
            //     'headerOptions' => ['width' => '110']
            // ],

            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'操作',
                'headerOptions'=>['width'=>'70'],
                'template'=>'{view}{delete}',
            ],
            // [
            //     'label'=>'产品说明',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
            //         return Html::a('管理', $url, ['title' => '产品说明']); 
            //     }
            // ]    
        ],
    ]); ?>
    
</div>
