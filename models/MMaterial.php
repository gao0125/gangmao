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
 * This is the model class for table "m_material".
 *
 * @property integer $id
 * @property string $name
 * @property string $updated_by
 * @property string $created_at
 * @property string updated_at
 */

class MMaterial extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_material';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','updated_by'],'required','message'=>"{attribute} 不能为空"],
            [['id','updated_by'],'integer'],
            [['name','created_at','updated_at'],'safe'],
            [['name'],'string','max'=>200],
            [['updated_by'],'string','max'=>10],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'name'  => '名称',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'updated_by' => '操作人',
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