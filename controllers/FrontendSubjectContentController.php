<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 18:40
 */
namespace backend\controllers;

use Yii;
use yii\helpers\Html;
use backend\models\FrontendSubjectContent;
use backend\models\search\FrontendSubjectContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * FrontendSubjectContentController implements the CRUD actions for FrontendSubjectContent model.
 */
class FrontendSubjectContentController extends Controller
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
     * Lists all FrontendSubjectContent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendSubjectContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new FrontendSubjectContent();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->imgs = UploadedFile::getInstance($model, 'imgs');

            if ($model->validate()) {
                $dir = __DIR__ . '/../../backend/web/files/subject' . $model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                $arr = rand(10000000,99999999);
                $fileName ='SC_'.$arr.'.' . $model->imgs->extension;
                $isSave = $isDirExist ? $model->imgs->saveAs($dir . '/' . $fileName) : '';
                $model->imgs = $isSave ? $fileName : 'no_image.jpg';
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

    public function actionView($id){
        $model=$this->findModel($id);
        $sub=\backend\models\FrontendSubject::find()->select('name')->where('id=:subjectid',[':subjectid'=>$model->subjectid])->asArray()->one();
        $model->subjectid=$sub['name'];
        $uname=\backend\models\FrontendUser::find()->select('nickname')->where('id=:userid',[':userid'=>$model->userid])->asArray()->one();
        $model->userid=$uname['nickname'];
        
       
        return $this->render('view', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->imgs = UploadedFile::getInstance($model, 'imgs');

            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/subject'.$model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
                $arr = rand(10000000,99999999);
                $fileName = 'SC_'.$arr.'.' . $model->imgs->extension;
                $isSave =  $isDirExist ? $model->imgs->saveAs($dir . '/' . $fileName) : '';
                $model->imgs  = $isSave ? $fileName : 'no_image.jpg';
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
     * Deletes an existing FrontendSubjectContent model.
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
     * Finds the FrontendSubjectContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendSubjectContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendSubjectContent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}