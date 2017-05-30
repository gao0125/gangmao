<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerJsFile( '/js/product/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = '订单管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('批量删除', 'javascript:void(0);', ["class" => "btn btn-success gridview"]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        "options" => ["class" => "grid-view","style"=>"overflow:auto", "id" => "grid"],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn',],
            [
                "class" => "yii\grid\CheckboxColumn",
                "name" => "id",
            ],
            'id',
            [
                'attribute'=>'status',
                'label' => '状态',
                'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    return  $model->getIsStatusText($model->status);
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'status',
                    \backend\models\FrontendOrder::$isStatus, ['class' => 'form-control'])
            ],
            'shopid',
            'userid',
            'no',
            [
                'attribute'=>'type',
                'label' => '类型',
                'value' => function($model){
                    //return $model->status == 1 ? "未审核" : "已审核";
                    switch($model->type)
                    {
                        case 0:
                            return "临时订单";
                            break;
                        case 1:
                            return "真实订单";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],
            'consignee',
            'consignee_cellphone',
            'consignee_address',
            'total_price',
            'discounted_price',
            'created_at',
            'updated_at',
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70']],
            /*[
                'label'=>'其它',
                'format'=>'raw',
                'value' => function($data){
                    $url = \yii\helpers\Url::to(['frontend-order-track/index', 'FrontendOrderTrack[orderid]' => $data->id]);
                    return Html::a('详情', 'javascript:;', ['onclick'=>'showLayer("' . $url . '");']) . '&nbsp;&nbsp;' ;//. Html::a('详情', $url, ['title' => '详情,规格,售后']) . '&nbsp;' . Html::a('图片', $imgUrl, ['title' => '图片']) ;
                }
            ]*/
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]);
    $this->registerJs('
        $(document).on(\'click\', \'.gridview\', function () {
            var keys = $("#grid").yiiGridView("getSelectedRows");
            console.log(keys);
            $.post("index.php?r=frontend-order%2Fdelete&id="+keys); 
        });
        ') ?>
</div>
<style type="text/css">
    .product_layer1 {
        position:absolute;

        /* 下面两条用于水平居中 */
        left:10%;
        margin-left:100px; /* 宽度的1半 */

        /* 下面两条用于垂直居中 */
        top:20%;
        margin-top:-58px; /* 高度的1半 */

        /*    width:200px;
            height:115px;*/
        z-index:99999;
    }

    #maskLayer{ position:absolute; top:0px; left:0px; width:100%; background-color:#000000; opacity:0.5; -moz-opacity:0.5; filter:alpha(opacity=70);z-index:99998;}
</style>
<p style="display: none;" id="product_layer" class="product_layer1"><span style="position: absolute; font-size: 20px;font-weight:bold;right:2%; margin-right:50px;top:20%; margin-top:-58px;" onclick="hiddenLayer();">关闭</span><iframe src="" id="product_layer_iframe" width="80%"></iframe></p>
