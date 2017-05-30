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
use yii\helpers\ArrayHelper;
use backend\models\MCnArea;

/**
 * This is the model class for table "m_warehouse".
 *
 * @property integer $id
 * @property string $updated_by
 * @property string $name
 * @property string $created_at
 * @property string updated_at
 */

class MWarehouse extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'm_warehouse';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','updated_by'],'required','message'=>"{attribute} 不能为空"],
            [['id'],'integer'],
            [['name','updated_by','created_at','updated_at'],'safe'],
            [['name'],'string','max'=>200],
            [['updated_by'],'string','max'=>10],
            [['m_cn_areaid'],'integer'],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'    => '编号',
            'name'  => '仓库名称',
            'updated_by'  => '更新人',
            'm_cn_areaid'=>'所在城市',
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
    public function getCityList($pid)
    {
      $model = MCnArea::findAll(array('pid'=>$pid));
        return ArrayHelper::map($model, 'id', 'name');
    }
    public function getM_cn_area()
    {
        /**
        * 第一个参数为要关联的字表模型类名称，
        *第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
        */
        return $this->hasMany(MCnArea::className(), ['id' => 'm_cn_areaid']);
    }
}