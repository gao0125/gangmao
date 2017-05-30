<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:02
 */
namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "frontend_ad".
 *
 * @property integer $id
 * @property string $plantform
 * @property string $sectionid
 * @property integer $status
 * @property string $type
 * @property string $desc
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendAd extends \yii\db\ActiveRecord {
    public static $isStatus = [ ''=> '全部',0=>'下线',1=>'在线'];
    public static function tableName(){
        return 'frontend_ad';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plantform','sectionid','status','type','desc'],'required'],
            [['id','status'],'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['plantform'],'string','max'=>3],
           // [['sectionid'],'string','max'=>10],
            [['status'],'integer','max'=>3],
            [['type'],'string','max'=>3],
            [['desc'],'string','max'=>400],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'plantform'  => '平台',
            'sectionid'  => '位置',
            'status'     => '状态',
            'type'       => '类型',
            'desc'       => '添加说明',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function getIsStatusText($state)
    {
        return isset(self::$isStatus[$state]) ? self::$isStatus[$state] : '未知';
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