<?php 
use backend\models\MCnArea;
use backend\models\MWarehouse;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
$a=MCnArea::find()->where(['id'=>Yii::$app->request->get('m_cn_areaid')])->all();
$a=MCnArea::findAll(array('id'=>Yii::$app->request->get('m_cn_areaid')));
$b=ArrayHelper::map($a, 'id', 'pid');
$model=new MCnArea();
 $c=MCnArea::find()->where(['id' =>$b[Yii::$app->request->get('m_cn_areaid')] ])->asArray()->one();

// // $name=\backend\models\MWarehouse::find()->where('m_cn_areaid=:m_cn_areaid',[':m_cn_areaid'=>$model->pid])->asArray()->all();
// //$orders = MWarehouse::find()->joinWith('m_cn_area')->where(['pid' => $b[Yii::$app->request->get('m_cn_areaid')]])->asArray()->all();
// $connection  = Yii::$app->db;
// $sql     = "select a.* from m_warehouse as a left join m_cn_area as b on a.m_cn_areaid=b.id where b.pid=".$c['id'];
//  $command = $connection->createCommand($sql);
//  $res     = $command->query();
// //var_dump($res);
// //var_dump($sql);
$view=Yii::$app->request->getHostInfo().Yii::$app->user->returnUrl.'/m-warehouse/view';
$update=Yii::$app->request->getHostInfo().Yii::$app->user->returnUrl.'/m-warehouse/update';
$delete=Yii::$app->request->getHostInfo().Yii::$app->user->returnUrl.'/m-warehouse/del';

?>
<?php 
for($i=1;$i<=5;$i++){
	echo "<br>";
}
?>
<div class="frontend-ad-content-index">
<h1>仓库管理</h1><br><br>
<table class="table table-striped table-bordered">
	
	<tr>
		<td>编号</td><td>仓库名称</td><td>所在城市</td><td>操作</td>
	</tr>
	<?php 
	foreach ($yy as $key => $value) {
	?>
	
	<tr data-key="<?php echo $key;?>">
		<td><?php echo $value['id']?></td><td><?php echo $value['name']?></td><td><?php echo $c['name']?></td><td><a href="<?php echo $view.'?id='.$value['id'];?>"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="<?php echo $update.'?id='.$value['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a> <a href="<?php echo Url::to(['m-warehouse/del','id'=>$value['id']]);?>"><span class="glyphicon glyphicon-trash"></span></a></td>
	</tr>
	<?php 
	}
	?>
</table>
</div>
