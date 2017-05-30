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
 * This is the model class for table "frontend_order".
 *
 * @property integer $id
 * @property string $status
 * @property string $shopid
 * @property integer $userid
 * @property string $type
 * @property string $consignee
 * @property integer $consignee_cellphone
 * @property string $consignee_address
 * @property string $total_price
 * @property integer $origin_price
 * @property string $discounted_price
 * @property string $couponid
 * @property string trackingid
 * @property string $customer_note
 * @property integer $ocustomer_note
 * @property string $discomerchant_note
 * @property string $transactionid
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendOrder extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_order';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['status','shopid','userid','type','consignee',
//            'consignee_cellphone','consignee_address','total_price',
//            'origin_price','discounted_price','couponid','trackingid','customer_note',
//            'merchant_note','transactionid','m_shippingid'],'required'],
//
//            [['id','status','shopid','userid','type','consignee_cellphone','total_price','origin_price','discounted_price','couponid','m_shippingid'],'integer'],
//            [['consignee','consignee_address','trackingid','customer_note','merchant_note','transactionid','created_at', 'updated_at'], 'safe'],
//
//
//            [['status'],'integer','max'=>100],
//            [['shopid'],'integer','max'=>4],
//            [['userid'],'integer','max'=>10],
//            [['type'],'integer','max'=>4],
//            [['consignee'],'string','max'=>50],
//            [['consignee_cellphone'],'integer','max'=>11,'min'=>11],
//            [['consignee_address'],'string','max'=>200],
//            [['total_price'],'integer','max'=>12],
//            [['origin_price'],'integer','max'=>12],
//            [['discounted_price'],'integer','max'=>12],
//            [['couponid'],'integer','max'=>10],
//            [['trackingid'],'string','max'=>100],
//            [['customer_note'],'string','max'=>500],
//            [['merchant_note'],'string','max'=>500],
//            [['transactionid'],'string','max'=>100],
//            [['m_shippingid'],'integer','max'=>11],
            [['status','shopid','userid','type','consignee',
                'consignee_cellphone','consignee_address','total_price',
                'origin_price','discounted_price','couponid','trackingid','customer_note',
                'merchant_note','transactionid','m_shippingid'],'required'],

            [['id','status','shopid','userid','no','type','consignee_cellphone','couponid','m_shippingid'],'integer'],
            [['consignee','no','total_price','origin_price','discounted_price','consignee_address','trackingid','customer_note','merchant_note','transactionid','created_at', 'updated_at'], 'safe'],


            [['status'],'integer','max'=>100],
            [['type'],'integer','max'=>4],
            [['consignee'],'string'],
            [['consignee_cellphone'],'integer'],
            [['consignee_address'],'string'],
            [['total_price'],'double'],
            [['origin_price'],'double'],
            [['discounted_price'],'double'],
            [['customer_note'],'string'],
            [['merchant_note'],'string'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                   => 'ID',
            'status'               => '订单状态',
            'shopid'               => '店铺',
            'userid'               => '用户',
            'type'                 => '类型',
            'no'                    => '订单号',
            'consignee'            => '收货人',
            'consignee_cellphone' => '收货人电话',
            'consignee_address'   => '收货地址',
            'total_price'          => '总价',
            'origin_price'         => '起始价格',
            'discounted_price'    => '折扣价',
            'couponid'             => '优惠券',
            'trackingid'           => '跟踪id',
            'customer_note'       => '客户注意',
            'merchant_note'       => '卖家注意',
            'transactionid'       => '交易id',
            'm_shippingid'        => 'M shippingid',
            'created_at'           => '创建时间',
            'updated_at'           => '更新时间',
        ];
    }

    public static $isStatus = [ ''=> '全部',1=>'待支付', 2=>'已支付/未确认', 3=>'线下支付', 4=>'已确认/待发货', 5=>'已发货/转运中(快递单号)', 9=>'已完成', 10=>'部分退货', 11=>'全单退货', 99=>'非正常单'];

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