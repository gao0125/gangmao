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
 * This is the model class for table "frontend_order_custom".
 *
 * @property integer $id
 * @property integer $userid
 * @property string $desc
 * @property integer $imgs
 * @property string $cellphone
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendOrderCustom extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_order_custom';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','desc','imgs','cellphone'],'required'],
            [['id','userid'],'integer'],
            [['desc','imgs','cellphone','created_at', 'updated_at'], 'safe'],
            [['userid'],'integer'],
            [['desc'],'string'],
            [['imgs'],'string', 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['cellphone'],'string','max'=>11,'min'=>11],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'userid'      => '用户',
            'desc'        => 'Desc',
            'imgs'        => '图片',
            'cellphone'   => '手机号码',
            'created_at'  => '创建时间',
            'updated_at'  => '更新时间',
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