<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "frontend_manufacturer".
 *
 * @property string $id
 * @property string $userid
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $updated_by
 */
class FrontendManufacturer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frontend_manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'updated_by'], 'integer'],
            [['name',], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
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
            'name' => '厂名',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'updated_by' => '更新人',
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
