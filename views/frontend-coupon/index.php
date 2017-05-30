<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendCouponSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = '优惠券统计管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-ad-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('新增', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('批量删除', 'javascript:void(0);', ["class" => "btn btn-success gridview"])?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        "options" => ["class" => "grid-view","style"=>"overflow:auto", "id" => "grid"],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                "class" => "yii\grid\CheckboxColumn",
                "name" => "id",
            ],
            'id',
            'shopid',
            'cataid',
            'productid',
//            'm_user_levelids',
            [
                'attribute'=>'m_user_levelids',
                'label' => '可用等级',
                'value' => function($model){
                    switch($model->m_user_levelids)
                    {
                        case 1:
                            return "青铜";
                            break;
                        case 2:
                            return "白银";
                            break;
                        case 3:
                            return "黄金";
                            break;
                        default:
                            return "暂无信息";
                    }
                },
            ],
            'name',
            'discount',
            [
                'attribute'=>'type',
                'label' => '折扣类型',
                'headerOptions'=>['width'=>'120'],
                'value'=> function($model){
                    return  $model->getIsTypeText($model->type);
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'type', \backend\models\FrontendCoupon::$isType, ['class' => 'form-control'])
            ],
            'created_at',
            'updated_at',
            'num',
            'rest_num',
//            'period',
            'started_at',
            'expired_at',
            'updated_by',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70']]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]);
    $this->registerJs('
            $(document).on(\'click\', \'.gridview\', function () {
            var keys = $("#grid").yiiGridView("getSelectedRows");
            console.log(keys);
            $.post("index.php?r=frontend-coupon%2Fdelete&id="+keys);
        });
        ')
    ?>
</div>
