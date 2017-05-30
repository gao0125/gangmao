<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "frontend_subject".
 *
 * @property string $id
 * @property string $pid
 * @property string $name
 * @property string $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $depth
 * @property string $route
 */
class FrontendSubject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'frontend_subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'created_by', 'updated_by', 'depth'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['depth'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['route'], 'string', 'max' => 255],
             [['desc'], 'string'],
              [['ico'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
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
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'name' => '名称',
            'created_by' => '创建人',
            'updated_by' => '更新人',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'depth' => 'Depth',
            'route' => 'Route',
            'desc' => '添加说明',
            'ico' => '图标',
        ];
    }
}
