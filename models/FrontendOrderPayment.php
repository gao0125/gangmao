<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/15 0015
 * Time: 18:41
 */
namespace backend\models;

use Yii;



/**
 * This is the model class for table "frontend_order_payment".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $orderid
 * @property integer $transactionid
 * @property string $amount
 * @property integer $type
 * @property string $mem
 * @property string $receipt_imgs
 * @property string $created_at
 * @property string $updated_at
 */
class FrontendOrderPayment extends \yii\db\ActiveRecord{
    public static function tableName(){
        return 'frontend_order_payment';
    }


    /*
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['status', 'orderid', 'transactionid', 'amount', 'type','mem','receipt_imgs'],'required'],
            [['status','orderid','type'],'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer', 'max' => 4],
            [['orderid'],'integer','max' => 11 ],
            [['transactionid'], 'string', 'max' => 60],
            [['amount'], 'string', 'max' => 12],
            [['type'], 'integer', 'max' => 4],
            [['mem'], 'string', 'max' => 400],
            [['receipt_imgs'],'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
        ];
    }
    /*
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'status'        => 'Status',
            'orderid'       => 'Orderid',
            'transactionid' => 'Transactionid',
            'amount'         => 'Amount',
            'type'           => 'Type',
            'mem'            => 'Mem',
            'receipt_imgs'  => 'Receipt Imgs',
            'created_at'     => 'Created At',
            'updated_at'     => 'Updated At',
        ];
    }
}