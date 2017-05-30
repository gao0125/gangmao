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
 * This is the model class for table "frontend_product_comment".
 *
 * @property integer $id
 * @property integer $orderid
 * @property integer $productid
 * @property integer $userid
 * @property string $nickname
 * @property integer $level
 * @property integer $logistics
 * @property integer $same
 * @property integer $delivery
 * @property integer $service
 * @property string $comment
 * @property string $imgs
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendProductComment extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_product_comment';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderid','productid','userid','nickname','level',
              'logistics','same','delivery','service','comment',
              ],'required','message'=>'{attribute} 不能为空'],
            [['orderid','productid','userid','level','logistics',
            'same','delivery','service'],'integer'],
            [['nickname','comment','imgs','created_at','updated_at'], 'safe'],
            [['orderid'],'integer'],
            [['productid'],'integer'],
            [['userid'],'integer'],
            [['nickname'],'string'],
            [['level'],'integer','max'=>3],
            [['logistics'],'integer'],
            [['same'],'integer','max'=>5],
            [['delivery'],'integer','max'=>5],
            [['service'],'integer','max'=>5],
            [['comment'],'string'],
            [['imgs'],'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'ID',
            'orderid'   => '订单',
            'productid' => '产品',
            'userid'    => '用户',
            'nickname'  => '昵称',
            'level'     => '评价等级',
            'logistics' => '物流',
            'same'       => '相符度',
            'delivery'  => '配送',
            'service'   => '服务',
            'comment'   => '评论',
            'imgs'      => '图片',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
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
    public static $level = [ ''=> '全部',1=>'好', 2=>'中',3=>'差'];
    public function getIsStatusText($state)
    {
        return isset(self::$level[$state]) ? self::$level[$state] : '未知';
    }
    public static function getUserList(){
        $items=\backend\models\FrontendUser::find()->select('id,nickname')->asArray()->all();
         $rt = [''=>'全部'];
        foreach ($items as $k => $v){
            $rt[$v['id']] = $v['nickname'];
        }
        return $rt;

    }
}