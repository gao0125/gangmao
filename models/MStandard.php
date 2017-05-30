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
 * This is the model class for table "m_standard".
 * @property integer $id
 * @property string $title
 * @property integer $userid
 * @property string $hash
 * @property string $filename
 * @property string $type
 * @property string $size
 * @property string $location
 * @property integer $class
 * @property string $created_at
 * @property string updated_at
 */

class MStandard extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_standard';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','userid','hash','filename','type','size','class'],'required'],
            [['id','userid','class'],'integer'],
            [['title','hash','filename','type','size','location','created_at','updated_at'],'safe'],
            [['title'],'string','max'=>100],
            [['userid'],'integer','max'=>10],
            [['hash'],'string','max'=>320],
            [['filename'],'string','max'=>240],
            [['type'],'string','max'=>12],
            [['size'],'string','max'=>12],
            [['class'],'integer','max'=>2],
        ];

    }
        public function setPassword($hash)
        {
            $this->hash = md5($hash);
        }
//        public function validatePassword($hash)
//        {
//            return $this->hash === md5($hash);
//        }
    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'    => 'ID',
            'title'  => '标题',
            'userid'  => '用户ID',
            'hash'  => 'Hash',
            'filename'  => '文件名',
            'type'  => '类型',
            'size'  => '大小',
            'location'  => '位置',
            'class'  => '类别',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
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