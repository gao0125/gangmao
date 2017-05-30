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
 * This is the model class for table "frontend_info".
 *
 * @property integer $id
 * @property string $code
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendInfo extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_info';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code','content'],'required','message'=>"{attribute} 不能为空"],
            [['code','content','created_at', 'updated_at'], 'safe'],
            [['code'],'string'],
            [['content'],'string'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => '编号',
            'code'        => '标题',
            'content'     => '内容',
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