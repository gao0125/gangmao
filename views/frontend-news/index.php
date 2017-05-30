<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendNewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = '新闻管理';
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
            'cataid',
            'title',
            'author',
            [
                'attribute'=>'ico',
                'format' =>['image',['width'=>'150','height'=>'100']],
            ],
            'created_at',
            'updated_at',
            // 'updated_by',
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
            $.post("index.php?r=frontend-news%2Fdelete&id="+keys);
        });
        ')
    ?>
</div>
