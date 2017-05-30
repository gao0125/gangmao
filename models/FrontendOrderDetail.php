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
 * This is the model class for table "frontend_order_detail".
 *
 * @property integer $orderid
 * @property integer $productid
 * @property integer $status
 * @property string $title
 * @property string $specification
 * @property string $price
 * @property integer $num
 * @property string $unit_name
 * @property string $subtotal
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendOrderDetail extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_order_detail';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderid','productid','status','title','specification',
                'price','num','unit_name','subtotal'],'required'],

            [['orderid','productid','status','num'],'integer'],
            [['title','specification','price','unit_name','subtotal','created_at', 'updated_at'], 'safe'],


            [['orderid'],'integer','max'=>11],
            [['productid'],'integer','max'=>11],
            [['status'],'integer','max'=>4],
            [['title'],'integer','max'=>150],
            [['specification'],'string','max'=>100],
            [['price'],'integer','max'=>12],
            [['num'],'string','max'=>11],
            [['unit_name'],'integer','max'=>10],
            [['subtotal'],'integer','max'=>12],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderid'       => 'orderid',
            'productid'     => 'productid',
            'status'         => 'status',
            'title'          => '标题',
            'specification' => '规格',
            'price'          => '价格',
            'num'            => '数量',
            'unit_name'      => '单位',
            'subtotal'       => '小计',
            'created_at'     => 'Created At',
            'updated_at'     => 'Updated At',
        ];
    }
}