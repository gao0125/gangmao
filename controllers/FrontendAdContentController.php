<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 18:40
 */
namespace backend\controllers;

use backend\models\FrontendProduct;
use Yii;
use backend\models\FrontendAdContent;
use backend\models\search\FrontendAdContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * FrontendAdContentController implements the CRUD actions for FrontendAdContent model.
 */
class FrontendAdContentController extends Controller
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
     * Lists all FrontendAdContent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendAdContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new FrontendAdContent();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->content = UploadedFile::getInstance($model, 'content');

            if ($model->validate()) {
                $dir = __DIR__ . '/../../backend/web/files/ad/' . $model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                $arr = rand(10000000,99999999);
                $fileName ='AD_'.$arr.'.' . $model->content->extension;

                $isSave = $isDirExist ? $model->content->saveAs($dir . '/' . $fileName) : '';
                $model->content = $isSave ? 'files/ad/'.$model->id .'/'.$fileName : 'no_image.jpg';
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data['content']= $model->content;


       // $model = $this->findModel($id);

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
          $content = $model->content = UploadedFile::getInstance($model, 'content');
            if (!$model->content){
                    $model->content = $data['content'];

            }


            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/ad/'.$model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
//                var_dump($isDirExist);
                $arr = rand(10000000,99999999);
                if (!empty($content)){
                    $model->content = UploadedFile::getInstance($model, 'content');
                    $fileName = 'AD_'.$arr.'.' . $model->content->extension;
                    $isSave =  $isDirExist ? $model->content->saveAs($dir . '/' . $fileName) : '';
                    $model->content  = $isSave ? 'files/ad/'.$model->id .'/'. $fileName : 'no_image.jpg';

                }



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
     * Deletes an existing FrontendAdContent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
    public function actionDelete($id)
    {
        $model=new FrontendAdContent();
        if($model->deleteAll("id in ($id)")){
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the FrontendAdContent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendAdContent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendAdContent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}