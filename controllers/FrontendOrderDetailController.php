<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:00
 */
namespace backend\controllers;

use Yii;
use backend\models\FrontendOrderDetail;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\search\FrontendOrderDetailSearch;
use yii\web\NotFoundHttpException;



class FrontendOrderDetailController extends Controller{
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
        $searchModel = new FrontendOrderDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($orderid){
        return $this->render('view', [
            'model' => $this->findModel($orderid),
        ]);
    }

    /**
     * Creates a new FrontendOrderDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $model = new FrontendOrderDetail();
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index', 'orderid' => $model->orderid]);
        }else{
            return $this->render('create',[
                    'model' => $model
                ]
            );
        }
    }



    /**
     * Updates an existing FrontendOrderDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $orderid
     * @return mixed
     */
    public function actionUpdate($orderid)
    {
        $model = $this->findModel($orderid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'orderid' => $model->orderid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }




    /**
     * Deletes an existing FrontendOrderDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $orderid
     * @return mixed
     */
    public function actionDelete($orderid)
    {
        $this->findModel($orderid)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the FrontendOrderDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $orderid
     * @return FrontendOrderDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($orderid)
    {
        if (($model = FrontendOrderDetail::findOne($orderid)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}