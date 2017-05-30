<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "frontend_subject_comment".
 * @property integer $id
 * @property integer $subject_contentid
 * @property integer $userid
 * @property string $comment
 * @property integer $agree
 * @property string $created_at
 * @property string $updated_at
 */
class FrontendSubjectComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $title;
    public static function tableName()
    {
        return 'frontend_subject_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_contentid', 'userid', 'comment', 'agree'], 'required'],
            [['created_at','comment', 'updated_at','title'], 'safe'],
            [['subject_contentid', 'userid', 'agree'], 'integer'],

            [['comment'], 'string', 'max' => 400],
            [['agree'], 'integer', 'max' => 10],
            [['title'],'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_contentid' => '主题内容',
            'userid' => '用户ID',
            'comment' => '评论内容',
            'agree' => '点赞数',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'title'=>'标题'
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
