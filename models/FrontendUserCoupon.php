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
 * This is the model class for table "frontend_user_coupon".
 *
 * @property integer $id
 * @property integer $couponid
 * @property integer $userid
 * @property integer $status
 * @property integer $shopid
 * @property integer $cataid
 * @property integer $productid
 * @property string $name
 * @property integer $type
 * @property integer $discount
 * @property string $started_at
 * @property string $expire_at
 * @property string $created_at
 * @property string $updated_at
 */





class FrontendUserCoupon extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_user_coupon';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['couponid','userid','status','shopid','cataid','productid','name','type','discount'],'required','message'=>"{attribute} 不能为空"],
            [['id','couponid','userid','status','shopid','cataid','productid','type'],'integer'],
            [['name','discount','created_at', 'updated_at','expired_at','started_at'], 'safe'],

            [['couponid'],'integer'],
            [['userid'],'integer'],
            [['status'],'integer','max'=>4],
            [['shopid'],'string'],
            [['cataid'],'string'],
            [['productid'],'integer'],
            [['name'],'string'],
            [['type'],'integer','max'=>3],
            [['discount'],'integer'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'couponid'   => '优惠券',
            'userid'     => '用户ID',
            'status'     => 'Status',
            'shopid'     => '店铺',
            'cataid'     => '分类',
            'productid'  => '产品',
            'name'       => '名称',
            'type'       => '类型',
            'discount'   => '折扣',
            'started_at' => '起始时间',
            'expired_at' => '结束时间',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public static $isStatus = [ ''=> '全部',0=>'无效', 1=>'有效',2=>'未开始'];
    public static $isType = [ ''=> '全部',1=>'固定', 2=>'百分比'];

    public function getIsStatusText($state)
    {
        return isset(self::$isStatus[$state]) ? self::$isStatus[$state] : '未知';
    }
    public function getIsTypeText($state)
    {
        return isset(self::$isType[$state]) ? self::$isType[$state] : '未知';
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