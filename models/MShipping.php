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
 * This is the model class for table "m_shipping".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $desc
 * @property string $created_at
 * @property string updated_at
 */

class MShipping extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_shipping';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type','name','desc'],'required','message'=>"{attribute} 不能为空"],
            [['id'],'integer'],
            [['type','name','desc','created_at','updated_at'],'safe'],
            [['type'],'string','max'=>10],
            [['name'],'string','max'=>255],
            [['desc'],'string'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'    => 'ID',
            'type'  => '状态',
            'name'  => '名称',
            'desc'  => '详情描述',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
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
}