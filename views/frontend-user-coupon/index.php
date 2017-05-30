<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendUserCouponSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户优惠券统计';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

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
            'couponid'=>[
                'attribute'=>'couponid',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\FrontendCoupon::find()->select('name')->where('id=:couponid',[':couponid'=>$model->couponid])->asArray()->one();
                    return $name['name'];
                },
                
            ],
            'userid'=>[
                'attribute'=>'userid',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
                    return $name['nickname'];
                },
                
            ],
            [
                'attribute'=>'status',
                'label' => '状态',
                'value' => function($model){
                    switch($model->status)
                    {
                        case 0:
                            return "无效";
                            break;
                        case 1:
                            return "有效";
                            break;
                        case 2:
                            return "未开始";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status',
                    \backend\models\FrontendUserCoupon::$isStatus, ['class' => 'form-control'])
            ],
            'shopid'=>[
                'attribute'=>'shopid',
                'format'=>'raw',
                'value'=>function($model){
                    $sname=\backend\models\FrontendShop::find()->select('name')->where('id=:shopid',[':shopid'=>$model->shopid])->asArray()->one();
                    return $sname['name'];
                },
                
            ],
            'cataid'=>[
                'attribute'=>'cataid',
                'format'=>'raw',
                'value'=>function($model){
                    $sname=\backend\models\FrontendCata::find()->select('name')->where('id=:cataid',[':cataid'=>$model->cataid])->asArray()->one();
                    return $sname['name'];
                },
                
            ],
            'productid'=>[
                'attribute'=>'productid',
                'format'=>'raw',
                'value'=>function($model){
                    $sname=\backend\models\FrontendProduct::find()->select('title')->where('id=:productid',[':productid'=>$model->productid])->asArray()->one();
                    return $sname['title'];
                },
                
            ],
            'name',
            [
                'attribute'=>'type',
                'label' => '类型',
                'value' => function($model){
                    switch($model->type)
                    {
                        case 1:
                            return "固定";
                            break;
                        case 2:
                            return "百分比";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'type',
                    \backend\models\FrontendUserCoupon::$isType, ['class' => 'form-control'])
            ],
            'discount',
//            'started_at',
//            'expired_at',
//            'created_at',
//            'updated_at',

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'操作',
            'headerOptions'=>['width'=>'70'],
            'template' => '{view} {delete}',
            ],
            // [
            //     'label'=>'用户优惠券统计',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         $url = \yii\helpers\Url::to(['frontend-product-desc/index', 'FrontendProductDesc[productid]' => $data->id]);
            //         return Html::a('管理', $url, ['title' => '用户优惠券统计']);
            //     }
            // ]
        ],
    ]); ?>
</div>
