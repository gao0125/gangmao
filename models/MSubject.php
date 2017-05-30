<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:02
 */
namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "m_subject".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $created_at
 * @property string updated_at
 */

class MSubject extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_subject';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type','code','val','name',],'required','message'=>"{attribute} 不能为空"],
            [['id','val'],'integer'],
            [['type','name','code','val','created_at','updated_at'],'safe'],
            [['type'],'string','max'=>3],
            [['name'],'string','max'=>50],
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
            'code'  => '说明',
            'type'  => '类型',           
            'val'=>'每次增加',
            'class',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public static $isStatus = [ ''=> '全部',0=>'每日多次', 1=>'每日只能一次', 9=>'只有一次'];
    public static $is_Status = [ ''=> '全部',0=>'积分相关', 1=>'余额相关'];
    public function getIsStatusText($state)
    {
        return isset(self::$isStatus[$state]) ? self::$isStatus[$state] : '未知';
    }
    public function getIs_StatusText($state)
    {
        return isset(self::$is_Status[$state]) ? self::$is_Status[$state] : '未知';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}