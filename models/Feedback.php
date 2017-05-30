<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "frontend_feedback".
 *
 * @property string $id
 * @property integer $userid
 * @property string $name
 * @property string $tel
 * @property string $email
 * @property string $brief
 * @property string $content
 * @property string $imgs
 * @property string $created_at
 * @property string $updated_at
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frontend_feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid'], 'integer'],
            [['name', 'tel', 'brief', 'content'], 'required','message'=>'{attribute} 不能为空'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 48],
            [['tel'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 100],
            [['brief', 'imgs'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => '用户ID',
            'name' => '名字',
            'tel' => '电话',
            'email' => '邮箱',
           'brief' => '客户端',
            'content' => '内容',
            'imgs' => '图片',
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
