<?php
namespace backend\components;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Url;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
/**
 * Description of Controller
 *
 * @author fitchsu
 */
class Controller extends \yii\web\Controller 
{
    public $path;
    
    public function cbehaviors(){
        return [];
    }
    
    public function init() {
        $this->path = (Yii::$app->id == $this->module->id ? $this->module->id . '/' : Yii::$app->id . '/'  . $this->module->id . '/') 
            . $this->id . '/' ;
        parent::init();
    }
    
    public final function behaviors()
    { 
        $behaviors = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'controllers' => ['site'],
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
        $rt = array_merge_recursive($this->cbehaviors(), $behaviors);
        foreach($rt as $k => $v) {
            if(is_array($v['class'])) {
                $rt[$k]['class'] =  $rt[$k]['class'][0];                
            }
        }
        //$rt['access']['class'] = is_array($rt['access']['class']) ? $rt['access']['class'][0] : $rt['access']['class'];
        return $rt;
    }

    public function beforeAction($action) 
    {
      
        $rute = $this->path . Yii::$app->controller->action->id;                 
        $pass = [$this->module->id . '/site/error', $this->module->id . '/site/login'];
        if(! in_array($rute, $pass) && Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);      
        }

        if(! in_array($rute, $pass) && ! Yii::$app->user->can($rute) && strtolower(Yii::$app->user->identity->username) != 'admin'){
            throw new ForbiddenHttpException(Yii::t('app', 'You do not have a permission to access:') . $rute);
        }  
        
        return parent::beforeAction($action);
    }
    
    
    //put your code here
}
