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
 * This is the model class for table "frontend_ad_section".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendAdSection extends \yii\db\ActiveRecord {
    public static function tableName(){
        return 'frontend_ad_section';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'],'required'],
            [['id'],'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'],'string','max'=>100],
            [['desc'],'string','max'=>400],
        ];

    }


    /*
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'title'       => 'Title',
            'desc'        => 'Desc',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}