<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:02
 */
namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "m_cn_area".
 *
 * @property string $id
 * @property string $name
 * @property string $pid
 * @property string $level
 * @property string $status
 * @property string $is_hot
 */


class MCnArea extends \yii\db\ActiveRecord {
    public $province;
    public $city;
    public $area;
    public static function tableName(){
        return 'm_cn_area';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','name','pid','level','status','is_hot'],'required','message'=>"{attribute} 不能为空"],
            [['id','name','pid','level','status','is_hot'],'safe'],
            [['id'],'string','max'=>18],
            [['name'],'string','max'=>50],
            [['pid'],'string','max'=>18],
            [['level'],'string','max'=>3],
            [['status'],'string','max'=>1],
            [['is_hot'],'string','max'=>1],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'    => 'ID',
            'name'  => '名称',
            'pid'  => '归属',
            'level' => '等级 ',
            'status' => '状态 ',
            'is_hot' => '热门',
        ];
    }
    
    // public function getCityList($pid)
    // {
    //   $model = MCnArea::findAll(array('pid'=>$pid));
    //     return ArrayHelper::map($model, 'id', 'name');
    // }
    public function getCityList($pid)
    {
        $model = MCnArea::findAll(array('pid'=>$pid));
        return ArrayHelper::map($model, 'id', 'name');
    }
}