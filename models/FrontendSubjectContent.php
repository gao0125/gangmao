<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frontend_subject_content".
 * @property integer $id
 * @property integer $subjectid
 * @property integer $userid
 * @property string $title
 * @property string $content
 * @property string $imgs
 * @property integer $agree
 * @property string $created_at
 * @property string $updated_at
 */
class FrontendSubjectContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frontend_subject_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subjectid', 'userid', 'title', 'content','imgs','agree',], 'required'],
            [['title','imgs','created_at','content', 'updated_at'], 'safe'],
            [['agree'], 'integer'],

            [['subjectid'], 'string'],
            [['userid'], 'string'],
            [['title'], 'string'],
            [['content'], 'string'],
            [['imgs'], 'string'],
            [['agree'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subjectid' => '话题',
            'userid' => '用户ID',
            'title' => '标题',
            'content' => '发贴内容',
            'imgs' => '图片',
            'agree' => '点赞数',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
