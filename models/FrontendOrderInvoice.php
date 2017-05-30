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
 * This is the model class for table "frontend_order_invoice".
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $orderid
 * @property string $company_name
 * @property string $duty_paragraph
 * @property string $bank
 * @property string $bank_account
 * @property string $address
 * @property string $tel
 * @property string $consignee
 * @property string $consignee_tel
 * @property string $zip_code
 * @property string $fax
 * @property string $consignee_address
 * @property string $detail
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendOrderInvoice extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_order_invoice';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','orderid','company_name','duty_paragraph','bank',
              'bank_account','address','tel', 'consignee','consignee_tel',
              'zip_code','fax','consignee_address','detail','status'],'required'],

            [['id','userid','orderid','status'],'integer'],
            [['company_name','duty_paragraph','bank','bank_account','address',
              'tel','consignee', 'consignee_tel','zip_code','fax', 'consignee_address',
              'detail','created_at','updated_at'], 'safe'],

            [['userid'],'integer','max'=>10],
            [['orderid'],'integer','max'=>10],
            [['company_name'],'string','max'=>100],
            [['duty_paragraph'],'string','max'=>100],
            [['bank'],'string','max'=>100],
            [['bank_account'],'string','max'=>100],
            [['address'],'string','max'=>100],
            [['tel'],'string','max'=>20],
            [['consignee'],'string','max'=>100],
            [['consignee_tel'],'string','max'=>100],
            [['zip_code'],'string','max'=>10],
            [['fax'],'string','max'=>20],
            [['consignee_address'],'string','max'=>100],
            [['detail'],'string'],
            [['status'],'integer','max'=>4],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                => 'ID',
            'userid'            => 'Userid',
            'orderid'           => 'Orderid',
            'company_name'      => '公司名称',
            'duty_paragraph'    => '税号',
            'bank'               => '银行',
            'bank_account'      => '银行账户',
            'address'            => '地址',
            'tel'                => '电话',
            'consignee'          => '收货人',
            'consignee_tel'      => '收货人电话',
            'zip_code'           => '邮政编码',
            'fax'                => '传真',
            'consignee_address' => '收货人地址',
            'detail'             => 'Detail',
            'status'             => 'Status',
            'created_at'         => 'Created At',
            'updated_at'         => 'Updated At',
        ];
    }
}