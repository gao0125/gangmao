<?php

namespace backend\controllers;

use Yii;
use backend\models\FrontendProductComment;
use backend\models\search\FrontendProductCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper; //'yii\helpers\FileHelper

/**
 * FrontendProductCommentController implements the CRUD actions for FrontendProductProcess model.
 */
class FrontendProductCommentController extends Controller
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
        $searchModel = new FrontendProductCommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FrontendProductComment model.
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
     * Creates a new FrontendProductComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FrontendProductComment();

        if(Yii::$app->request->isPost){
            //var_dump($model->id);
            $model->load(Yii::$app->request->post());
            $model->imgs = UploadedFile::getInstance($model, 'imgs');

            if ($model->validate()) {

                $dir = __DIR__.'/../../backend/web/files/comment/'.$model->id;
                //var_dump($dir);exit();
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
                $arr = rand(10000000,99999999);
                $fileName = 'FP_'.$arr.'.' . $model->imgs->extension;
                $isSave =  $isDirExist ? $model->imgs->saveAs($dir . '/' . $fileName) : '';
                $model->imgs  = $isSave ? 'files/comment/'.$model->id .'/' . $fileName : 'no_image.jpg';
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
     * Updates an existing FrontendProductComment model.
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
                $dir = __DIR__.'/../../backend/web/files/comment/'.$model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
                $arr = rand(10000000,99999999);
                $fileName = 'FP_'.$arr.'.' . $model->imgs->extension;
                $isSave =  $isDirExist ? $model->imgs->saveAs($dir . '/' . $fileName) : '';
                $model->imgs  = $isSave ? 'files/comment/'.$model->id .'/' . $fileName : 'no_image.jpg';
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
     * Deletes an existing FrontendProductComment model.
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
     * Finds the FrontendProductComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendProductComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendProductComment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
