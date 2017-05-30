<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 13:02
 */
namespace backend\models;

use Yii;


/**
 * This is the model class for table "frontend_delivery".
 *
 * @property integer $id
 * @property integer $userid
 * @property string $loading_point
 * @property integer $unloading_point
 * @property integer $cataid
 * @property string $weight
 * @property string $distance
 * @property string price
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendDelivery extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_delivery';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['id','userid','status','total_price'],'required'],
//            [['id','userid','cataid'],'integer'],
//            [['loading_point','unloading_point','weight','distance','price','created_at', 'updated_at'], 'safe'],
//            [['userid'],'integer','max'=>10],
//            [['loading_point'],'string','max'=>200],
//            [['unloading_point'],'string','max'=>200],
//            [['cataid'],'integer','max'=>10],
//            [['weight'],'string','max'=>12],
//            [['distance'],'string','max'=>16],
//            [['price'],'string','max'=>16]
            [['id','userid','status','total_price'],'required'],
            [['id','userid','orderid','status'],'integer'],
            [['status'],'integer','max'=>4],
            [['tel'],'integer'],
            [['address'],'string','max'=>200],
            [['consignee'],'string','max'=>10],
            [['created_at', 'updated_at'], 'safe'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'      => 'ID',
            'userid'  => '用户id',
            'orderid' => '订单id',
            'status' => '状态',
            'consignee'      => '收货人',
            'address'      => '收货地址',
            'total_price'    => '价格',
            'tel'       => '联系方式',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}