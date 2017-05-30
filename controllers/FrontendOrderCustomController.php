<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:00
 */
namespace backend\controllers;

use Yii;
use backend\models\FrontendOrderCustom;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\search\FrontendOrderCustomSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;


class FrontendOrderCustomController extends Controller{
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
        $searchModel = new FrontendOrderCustomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FrontendOrderCustom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $model = new FrontendOrderCustom();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->imgs = UploadedFile::getInstance($model, 'imgs');

            if ($model->validate()) {
                $dir = __DIR__ . '/../../backend/web/files/custom/' . $model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                $arr = rand(10000000,99999999);
                $fileName ='custom_'.$arr.'.' . $model->imgs->extension;
                $isSave = $isDirExist ? $model->imgs->saveAs($dir . '/' . $fileName) : '';
                $model->imgs = $isSave ? 'files/custom/'.$model->id .'/'.$fileName : 'no_image.jpg';
            }
        }

        if (Yii::$app->request->isPost && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Updates an existing FrontendOrderCustom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->imgs = UploadedFile::getInstance($model, 'imgs');

            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/custom/'.$model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
                $arr = rand(10000000,99999999);
                $fileName = 'custom_'.$arr.'.' . $model->imgs->extension;
                $isSave =  $isDirExist ? $model->imgs->saveAs($dir . '/' . $fileName) : '';
                $model->imgs  = $isSave ? 'files/custom/'.$model->id .'/'.$fileName : 'no_image.jpg';
            }
//            var_dump(Yii::$app->request->post());die();
        }

        if (Yii::$app->request->isPost && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }




    /**
     * Deletes an existing FrontendOrderCustom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the FrontendOrderCustom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendOrderCustom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendOrderCustom::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}