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
 * This is the model class for table "m_delivery_ratio".
 *
 * @property integer $id
 * @property string $type
 * @property string $value
 * @property string $ratio
 * @property string $created_at
 * @property string updated_at
*/

class MDeliveryRatio extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_delivery_ratio';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type','value','ratio'],'required','message'=>"{attribute} 不能为空"],
            [['id'],'integer'],
            [['type','value','ratio','created_at','updated_at'],'safe'],
            [['name'],'string','max'=>4],
            [['pid'],'string','max'=>16],
            [['level'],'string','max'=>12],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'type'  => '类型',
            'value'  => '数值',
            'ratio' => '比率',
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