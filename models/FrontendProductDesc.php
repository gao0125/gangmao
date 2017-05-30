<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frontend_product_desc".
 *
 * @property integer $id
 * @property string $productid
 * @property integer $type
 * @property integer $section
 * @property string $desc
 * @property string $created_at
 * @property string $updated_at
 */
class FrontendProductDesc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frontend_product_desc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid', 'type', 'section', 'desc'], 'required'],
            [['productid', 'type', 'section'], 'integer'],
            [['desc'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['productid', 'type', 'section'], 'unique', 'targetAttribute' => ['productid', 'type', 'section'], 'message' => 'The combination of Productid, Type and Section has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productid' => 'Productid',
            'type' => 'Type',
            'section' => 'Section',
            'desc' => 'Desc',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
