<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "frontend_shop".
 *
 * @property integer $id
 * @property string $logo
 * @property string $name
 * @property string $address
 * @property integer $status
 * @property string $banner
 * @property integer $tel
 * @property integer $cellphone
 * @property string $sphere
 * @property string $created_at
 * @property string $updated_at
 */
class FrontendShop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $f_logo = '';
    public static $isRecommendation = [''=> '全部', 1=>'是', 0=>'否'];

    public static $isStatus = [ ''=> '全部',0=>'未审核', 1=>'已审核',2=>'已认证',3=>'黑名单'];
    public static function tableName()
    {
        return 'frontend_shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'status','sphere','tel','cellphone'], 'required'],
            [['id', 'status','tel','cellphone'], 'integer'],
            [['logo', 'name', 'address','banner','sphere','created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['logo'], 'file', 'skipOnEmpty' => true,'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['address'], 'string', 'max' => 255],
            [['banner'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['tel'], 'integer'],
            [['cellphone'], 'integer'],
            [['sphere'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo' => '店铺图标',
            'name' => '店铺名称',
            'address' => '店铺位置',
            'banner' => '店铺广告图',
            'tel' => '店铺电话',
            'cellphone' => '手机号',
            'sphere' => '营业范围',
            'status' => '店铺状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
    public function getIsStatusText($state)
    {
        return isset(self::$isStatus[$state]) ? self::$isStatus[$state] : '未知';
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
