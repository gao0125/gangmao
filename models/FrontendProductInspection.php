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
 * This is the model class for table "frontend_product_inspection".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $cataid
 * @property string $product_name
 * @property string $product_standard
 * @property integer $m_materialid
 * @property string $specification
 * @property string $weight
 * @property integer $m_inspectionid
 * @property string $m_inspection_methods
 * @property string $imgs
 * @property string $mem
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendProductInspection extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_product_inspection';
    }
    public function getFrontendProductInspectionDetail()
    {
        // hasOne要求返回两个参数 第一个参数是关联表的类名 第二个参数是两张表的关联关系 
        // 这里uid是auth表关联id, 关联user表的uid id是当前模型的主键id
        return $this->hasOne(FrontendProductInspectionDetail::className(), ['product_inspectionid' => 'id']);
    }
    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['id','userid','orderid','tel','status'],'integer'],
            [['mem','total_price','created_at','updated_at'], 'safe'],

            [['imgs'],'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',]

        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'userid'      => '用户ID',
            'orderid'     => '订单ID',
            'tel'          =>       '电话',
            'total_price' => '价格',
            'status' => '状态',
            'imgs'           => '图片',
            'created_at'    => '创建时间',
            'updated_at'    => '更新时间',

        ];
    }
    public static $isStatus = [ ''=> '全部',0=>'待审核', 1=>'已审核'];

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