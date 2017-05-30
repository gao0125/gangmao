<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendSubjectContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '社区话题内容管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-subject-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
    //话题下拉
        $subjectList = \backend\models\FrontendSubject::find()->select('id,name')->asArray()->all();
        //var_dump($subjectList);exit();
        $val=[''=>'全部'];
        foreach ($subjectList as $key => $value) {
            $val[$value['id']]=$value['name'];
        }
        //用户下拉
        $userList = \backend\models\FrontendUser::find()->select('id,nickname')->asArray()->all();
        //var_dump($userList);exit();
        //var_dump($subjectList);exit();
        $val2=[''=>'全部'];
        foreach ($userList as $k => $v) {
            $val2[$v['id']]=$v['nickname'];
        }
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'subjectid'=>[
                'attribute'=>'subjectid',
                'format'=>'raw',
                'value'=>function($model){
                    $sname=\backend\models\FrontendSubject::find()->select('name')->where('id=:subjectid',[':subjectid'=>$model->subjectid])->asArray()->one();
                    return $sname['name'];
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'subjectid', 
                          $val  , ['class' => 'form-control']),
                
            ],
            'userid'=>[
                'attribute'=>'userid',
                'format'=>'raw',
                'value'=>function($model){
                    $sname=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
                    return $sname['nickname'];
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'userid', 
                          $val2  , ['class' => 'form-control']),
                
            ],
            'title',
            'content'=>[
                'attribute'=>'content',
                'format'=>'raw',
                'value'=>function($model){
                    if(strlen($model->content)>50){
                    $name=mb_substr($model->content,0,40,'utf-8');
                    return $name.'.....';
                    }else{
                        return $model->content;
                    }
                },
                
            ],
            //'imgs',
            'agree',
             'created_at',
             'updated_at',
            // 'depth',
            // 'route',

           ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70'],
                'template'=>'{view}{delete}'],
                [
                'label'=>'管理',
                'format'=>'raw',
                'value' => function($data){
                    $url = \yii\helpers\Url::to(['frontend-subject-comment/index', 'cid' => $data->id]);
                    return Html::a('管理', $url, ['title' => '管理']);
                }
            ]
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
