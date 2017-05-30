<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 18:40
 */
namespace backend\controllers;

use Yii;
use backend\models\FrontendDemand;
use backend\models\search\FrontendDemandSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * FrontendDemandController implements the CRUD actions for FrontendDemand model.
 */
class FrontendDemandController extends Controller
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
     * Lists all FrontendDemand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendDemandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new FrontendDemand();
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index', 'id' => $model->id]);
        }else{
            return $this->render('create',[
                    'model' => $model
                ]
            );
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

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->f_imgurl = UploadedFile::getInstance($model, 'f_imgurl');

            if ($model->validate()) {
                $dir = __DIR__.'/../../backend/web/files/demand/'.$model->id;
                $isDirExist = FileHelper::createDirectory($dir, $mode = 0775, $recursive = true);
                if(! empty( $model->f_imgurl)){
                    $arr = rand(10000000,99999999);
                    $fileName = 'demand_'. $arr.'.' . $model->f_imgurl->extension;
                    $isSave =  $isDirExist ? $model->f_imgurl->saveAs($dir . '/' . $fileName) : '';
                    $model->img_urls  = $isSave ?  'files/demand/' .$model->id . '/'. $fileName : 'no_image.jpg';
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
     * Deletes an existing FrontendDemand model.
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
     * Finds the FrontendDemand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendDemand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendDemand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}