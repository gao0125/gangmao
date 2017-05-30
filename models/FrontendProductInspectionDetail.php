<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "frontend_product_inspection_detail".
 *
 * @property string $id
 * @property string $product_inspectionid
 * @property string $cataid
 * @property string $product_title
 * @property string $product_standard
 * @property integer $m_materialid
 * @property string $specification
 * @property string $weight
 * @property string $m_inspectionid
 * @property string $m_inspection_methods
 * @property string $imgs
 * @property string $mem
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 */
class FrontendProductInspectionDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'frontend_product_inspection_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_inspectionid', 'm_inspectionid', 'm_inspection_methods'], 'required'],
            [['product_inspectionid', 'cataid', 'm_materialid', 'm_inspectionid', 'status'], 'integer'],
            [['weight', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_title', 'product_standard', 'specification'], 'string'],
            [['m_inspection_methods', 'imgs'], 'string'],
            [['mem'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_inspectionid' => 'Product Inspectionid',
            'cataid' => '货物类型',
            'product_title' => '产品名称',
            'product_standard' => '生产标准',
            'm_materialid' => '材质',
            'specification' => '规格',
            'weight' => '数量',
            'm_inspectionid' => '检验机构',
            'm_inspection_methods' => '检验方法',
            'imgs' => '照片',
            'mem' => '备注',
            'price' => '价格',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'status' => '状态',
        ];
    }
    public static $isStatus = [ ''=> '全部',0=>'删除', 1=>'正常订单',2=>'已支付',4=>'已确认'];

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
