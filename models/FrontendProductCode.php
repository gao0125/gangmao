<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frontend_product_code".
 *
 * @property string $id
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 */
class FrontendProductCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frontend_product_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 10],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public static function getGroupidByCode($code)
    {
        $code = (string)$code;
        $model = self::findOne(['code'=> $code]);
        
        if(empty($model)){
            $model = new self;
            $model->code = $code;
            $model->save();
        }
        return $model;        
    }
}
