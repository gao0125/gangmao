<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\frontendProductInspectionDetail;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendProductInspectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品检验管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
if(Yii::$app->session->hasFlash('info')){
    echo "<div style='color:red;font-size:20px;text-align:center'>";
    echo Yii::$app->session->getFlash('info');
    echo "</div>";
}
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
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'orderid',
            'tel',
            'total_price',
            'frontendProductInspectionDetail.price',
            'frontendProductInspectionDetail.weight',
            [
                'attribute'=>'status',
                'label' => '检验状态',
                'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    return  $model->getIsStatusText($model->status);
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status',
                    \backend\models\FrontendProductInspection::$isStatus, ['class' => 'form-control'])
            ],
            [
                'attribute'=>'imgs',
                'format' =>['image',['width'=>'150','height'=>'100']],
            ],
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70'],
                'template' => '{update} {delete}',
                'buttons' => [
                    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '删除'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            //'data-confirm' => Yii::t('yii', '是否要删除本区域?'),
                            'data-method' => 'post',
                            'data-pjax' => '1',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                    },
                ]
                ],

            [
                'label'=>'详细',
                'format'=>'raw',
                'value' => function($data){
                    $url = \yii\helpers\Url::to(['frontend-product-inspection-detail/index', 'piid'=> $data->id]);
                    return Html::a('详细', $url, ['title' => '详细']); 
                }
            ]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
