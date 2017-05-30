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
 * This is the model class for table "frontend_coupon".
 *
 * @property integer $id
 * @property integer $shopid
 * @property integer $cataid
 * @property integer $productid
 * @property string $m_user_levelids
 * @property integer $name
 * @property integer $type
 * @property string $discount
 * @property integer $num
 * @property integer $rest_num
 * @property integer $period
 * @property string $started_at
 * @property string $expire_at
 * @property string $created_at
 * @property string $updated_at
 * @property integer $updated_by
 */





class FrontendCoupon extends \yii\db\ActiveRecord {
    public static $isType = [ ''=> '全部',1=>'固定',2=>'百分比'];
    public static function tableName(){
        return 'frontend_coupon';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shopid','cataid','productid','m_user_levelids','name','type','discount','num','rest_num','period'],'required'],
            [['id','shopid','cataid','productid','rest_num','period','updated_by'],'integer'],
            [['name','created_at', 'updated_at','expired_at','started_at'], 'safe'],
            [['m_user_levelids'],'string','max'=>200],
            [['name'],'string','max'=>100],
            [['type'],'integer','max'=>3],
            [['discount'],'string'],
            [['num'],'integer'],
            [['rest_num'],'integer'],
            [['period'],'integer'],
            [['updated_by'],'integer'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'               => 'ID',
            'shopid'           => '店铺',
            'cataid'           => '分类',
            'productid'        => '产品',
            'm_user_levelids'  => '用户等级',
            'name'              => '名称',
            'type'              => '类型',
            'discount'          => '折扣',
            'num'               => '总数量',
            'rest_num'          => '剩余数',
            'period'            => '时期',
            'started_at'        => '起始时间',
            'expired_at'        => '结束时间',
            'created_at'        => '创建时间',
            'updated_at'        => '更新时间',
            'updated_by'        => '更新人',
        ];
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