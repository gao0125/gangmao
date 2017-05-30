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
 * This is the model class for table "frontend_resource".
 *
 * @property integer $id
 * @property integer $userid
 * @property string $status
 * @property string $company_name
 * @property string $cataid
 * @property string $sub_cata
 * @property integer $m_warehouseid
 * @property string $steel_factory
 * @property integer $contact
 * @property string $phone
 * @property string $desc
 * @property string $url
 * @property integer $cnt
 * @property string $created_at
 * @property string $updated_at
 */


class FrontendResource extends \yii\db\ActiveRecord {

    public $url = '';


    public static function tableName(){
        return 'frontend_resource';
    }

    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','status','company_name','cataid','sub_cata',
                'm_warehouseid','steel_factory','contact','phone','desc',
                'url','cnt'],'required'],
            [['id','userid','status','cataid','m_warehouseid','cnt'],'integer'],
            [['company_name','sub_cata','steel_factory','phone','desc',
                'url','created_at','updated_at'], 'safe'],

            [['userid'],'integer','max'=>10],
            [['status'],'integer','max'=>3],
            [['company_name'],'string','max'=>100],
            [['cataid'],'integer','max'=>11],
            [['sub_cata'],'string','max'=>200],
            [['m_warehouseid'],'integer','max'=>100],
            [['steel_factory'],'string','max'=>100],
            [['contact'],'string','max'=>100],
            [['phone'],'string','max'=>20],
            [['desc'],'string','max'=>400],
            [['cnt'],'string','max'=>10],
            [['url'],'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',]
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
            'company_name' => 'Company Name',
            'cataid'      => 'Cataid',
            'sub_cata'           => 'Sub Cata',
            'm_warehouseid'     => 'M Warehouseid',
            'steel_factory'   => 'Steel Factory',
            'contact' => 'Contact',
            'phone' => 'Phone',
            'desc'      => 'Desc',
            'url'        => 'Url',
            'cnt'         => 'Cnt',
            'created_at'    => 'Created At',
            'updated_at'    => 'Updated At',
        ];
    }
}