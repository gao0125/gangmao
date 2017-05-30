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
 * This is the model class for table "frontend_user_msg".
 *
 * @property integer $id
 * @property string $userid
 * @property integer $type
 * @property string $content
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendUserMsg extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_user_msg';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','content','status'],'required'],
            [['id','userid','type','status'],'integer'],
            [['content','created_at', 'updated_at'],'safe'],
            [['type'],'integer'],
            [['content'],'string'],

        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'    => 'ID',
            'userid'  => '用户ID',
            'type'  => '类型',
            'content' => '内容',
            'status' => '	状态',
            'created_at'  => '创建时间',
            'updated_at'  => '更新时间',
        ];
    }
    public static $isStatus = [ ''=> '全部',0=>'未读',1=>'已读'];

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