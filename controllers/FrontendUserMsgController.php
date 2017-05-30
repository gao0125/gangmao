<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:00
 */
namespace backend\controllers;

use common\services\Msg;
use Yii;
use backend\models\FrontendUserMsg;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\search\FrontendUserMsgSearch;
use yii\web\NotFoundHttpException;
use common\services\Getui;



class FrontendUserMsgController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    /*
     * @inheritdoc
     */
    public function actionIndex()
    {
        $searchModel = new FrontendUserMsgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FrontendUserMsg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $model = new FrontendUserMsg();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $content = $model->content;
            $type = $model->type;
            if ($type == 1){
                $value = array('value'=>'1');
            }else if($type == 2){
                $value = array('value'=>'2');
            }else if($type == 3){
                $value = array('value'=>'3');
            }
            $params = $model::find()->select('content,type')->
            where(['content'=>$content,'type'=>$type])->asArray()->one();
            $params = array_merge($params,$value);
//            var_dump($params);die();
            $userid = $model->userid;
            $cid = \backend\models\FrontendUser::find()->select('cid')->
            where(['id'=>$userid])->asArray()->one();

            $tui = new Getui($params) ;
            $tui->send($cid);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                    'model' => $model
                ]
            );
        }

    }



    /**
     * Updates an existing FrontendUserMsg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }




    /**
     * Deletes an existing FrontendUserMsg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model =new FrontendUserMsg();
        if($model->deleteAll("id in($id)")){
            return $this->redirect(['index']);
        }
    }


    /**
     * Finds the FrontendUserMsg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return FrontendUserMsg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendUserMsg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}