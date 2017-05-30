<?php 
class gao {
	public $params;
	public function rt($params){
		 $rows = (new \yii\db\Query())
		->from('admin')
		->addParams('code'=>'%陈%')
		->all();
	}
}
?>