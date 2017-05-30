<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:00
 */
namespace backend\controllers;

use Yii;
use backend\models\FrontendUser;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\search\FrontendUserSearch;
use yii\web\NotFoundHttpException;



class FrontendUserController extends Controller
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
        $searchModel = new FrontendUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSite(){
        $id=Yii::$app->request->get('id');
        $status=Yii::$app->request->get('status');
        if($id!=''&&$status!=''){
            if($status==10){
               Yii::$app->db->createCommand()->update('frontend_user', ['status' => 0], 'id ='.$id)->execute();
                return $this->redirect(['index']);
            }else{
                Yii::$app->db->createCommand()->update('frontend_user', ['status' => 10], 'id ='.$id)->execute();
                return $this->redirect(['index']);
            }
        }
    }
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }

    /**
     * Creates a new FrontendUserBalance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


//    public function actionCreate()
//    {
//        $model = new FrontendUserBalance();
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
////            var_dump($model->getFirstErrors());die();
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                    'model' => $model
//                ]
//            );
//        }
//
//    }
//
//
//
//    /**
//     * Updates an existing FrontendUserBalance model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//
//
//
//    /**
//     * Deletes an existing FrontendUserBalance model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//
//    /**
//     * Finds the FrontendUserBalance model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return FrontendUserBalance the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = FrontendUserBalance::findOne($id)) !== null) {
//            return $model;
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }

}