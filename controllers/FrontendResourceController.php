<?php

namespace backend\controllers;

use Yii;
use backend\models\FrontendResource;
use backend\models\search\FrontendResourceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper; //'yii\helpers\FileHelper

/**
 * FrontendResourceController implements the CRUD actions for FrontendResource model.
 */
class FrontendResourceController extends Controller
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

    /**
     * Lists all FrontendProductProcess models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendResourceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FrontendResource model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FrontendResource model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FrontendResource();
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->url = UploadedFile::getInstance($model, 'url');

            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/resource'.$model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
                $arr = rand(10000000,99999999);
                $fileName = 'FP_'.$arr.'.' . $model->url->extension;
                $isSave =  $isDirExist ? $model->url->saveAs($dir . '/' . $fileName) : '';
                $model->url  = $isSave ? 'files/resource/' . $fileName : 'no_image.jpg';
            }
//            var_dump(Yii::$app->request->post());die();
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
     * Updates an existing FrontendResource model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->url = UploadedFile::getInstance($model, 'url');

            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/resource'.$model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
                $arr = rand(10000000,99999999);
                $fileName = 'FP_'.$arr.'.' . $model->url->extension;
                $isSave =  $isDirExist ? $model->url->saveAs($dir . '/' . $fileName) : '';
                $model->url  = $isSave ? 'files/resource/' . $fileName : 'no_image.jpg';
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
     * Deletes an existing FrontendResource model.
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
     * Finds the FrontendResource model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendResource the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendResource::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
