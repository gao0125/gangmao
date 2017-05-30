<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FrontendSubjectCommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '社区话题评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-subject-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?php 
    $cataList = ['' => '全部'];
    $cataList = $cataList + \common\services\Subject::getSubjectContentList();

     //用户下拉
        $userList = \backend\models\FrontendUser::find()->select('id,nickname')->asArray()->all();
        //var_dump($userList);exit();
        //var_dump($subjectList);exit();
        $val2=[''=>'全部'];
        foreach ($userList as $k => $v) {
            $val2[$v['id']]=$v['nickname'];
        }
       ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title'=>[
                'attribute'=>'title',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\FrontendSubjectContent::find()->select('title')->where('id=:subject_contentid',[':subject_contentid'=>$model->subject_contentid])->asArray()->one();
                    return $name['title'];
                },
                
            ],
            'subject_contentid'=>[
                'attribute'=>'subject_contentid',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\FrontendSubjectContent::find()->select('content')->where('id=:subject_contentid',[':subject_contentid'=>$model->subject_contentid])->asArray()->one();
                    if(strlen($name['content'])>50){
                    $name=mb_substr($name['content'],0,40,'utf-8');
                    return $name.'.....';
                    }else{
                        return $name['content'];
                    }

                },
                'filter'=>\yii\helpers\Html::activeDropDownList($searchModel, 'subject_contentid', 
                          $cataList  , ['class' => 'form-control']),
                
            ],
            'userid'=>[
                'attribute'=>'userid',
                'format'=>'raw',
                'value'=>function($model){
                    $name=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
                    return $name['nickname'];
                },
                'filter' => \yii\helpers\Html::activeDropDownList($searchModel, 'userid', 
                          $val2  , ['class' => 'form-control']),
                
            ],
            'comment',
            'agree',
//            'created_by',
//            'updated_by',
             'created_at',
             'updated_at',
            // 'depth',
            // 'route',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'headerOptions'=>['width'=>'70'],
                'template'=>'{view}{delete}'],
        ],
        'emptyText'=>'暂无查询结果',
        'emptyTextOptions'=>['style'=>'color:red;font-weight:bold'],
        'layout'=>"{items}\n{pager}",
    ]); ?>
</div>
