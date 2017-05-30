<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\components\Controller;//yii\web\Controller;
use backend\models\LoginForm;
use backend\models\User;
use yii\filters\VerbFilter;


/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout='main';
    
    /**
     * @inheritdoc
     */
    public function cbehaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];        
    } 
   
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionTest()
    {
        echo 'ddddd';
       return $this->render('index');
    }
    public function actionIndex()
    {
//        $getui = new \common\services\Getui(Yii::$app->params['getui']);
//            $msg = new \common\services\Msg;
//            $msg->type=1;
//            $msg->content ='测试消息';
//        $getui->msg = $msg->toJson();
//        $getui->send();
        
//        die();
        
        
//        $items = \backend\models\FrontendCata::find()->indexBy('id')->asArray()->all();
//        print_r($items);
//        
//        echo  '+++++++++++++++++<br>';
//        
//        print_r(\common\services\Cata::getTree($items));
        //var_dump(Yii::$app->user->username);die();
        $this->layout = 'main';
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = 'normal';

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        //$model = new User();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //Yii::$app->session['username']=$this.username;
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionChangePassword()
    {
        
    }
}
