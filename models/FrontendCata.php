<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frontend_cata".
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
 * @property string $ico
 */
class FrontendCata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frontend_cata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'created_by', 'updated_by', 'depth'], 'integer'],
            [['created_at', 'updated_at','ico'], 'safe'],
            [['depth','ico'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['route'], 'string', 'max' => 255],
            [['ico'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
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
            'name' => 'Name',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'depth' => 'Depth',
            'route' => 'Route',
            'ico' => 'Ico',
        ];
    }
}
