<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
//                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>
        <?php
        
        $sideMenuItems = [
            'rbac'=>[
                    ['label' => '权限管理'],
                    ['label' => '分配角色', 'url' => ['rbac/assignment']],
                    ['label' => '权限列表', 'url' => ['rbac/permission']],
                    ['label' => '角色管理', 'url' => ['rbac/role']],
                   // ['label' => 'Rule', 'url' => ['rbac/rule']],                
                ],
            'user'=>[
                    ['label' => '用户管理'],
                    ['label' => '用户列表', 'url' => ['user']],
                    ['label' => '创建用户', 'url' => ['user/create']]
            ],                
        ]        
        ?>
        
        
        <div class="container-fluid">
          <div class="row">              
            <div class="col-sm-3 col-md-2 sidebar">
            <?php
                $module = Yii::$app->id == Yii::$app->controller->module->id ? '' :  Yii::$app->controller->module->id . '/';
                $rute = $module . Yii::$app->controller->id . (Yii::$app->controller->action->id == 'index' ? '' : '/' . Yii::$app->controller->action->id);                 
                $mainModule = $module ? : Yii::$app->controller->id . '/';
                foreach($sideMenuItems as $k => $v) {
                    echo '<ul class="nav nav-sidebar">';
                    $title = array_shift($v);
                    $inMenu = $k . '/' == $mainModule;
       
                    $class =  $inMenu ? '' : 'class="collapsed"';
                    $subClass = $inMenu ? 'class="nav-sidebar collapse in"' : 'class="nav-sidebar collapse"';
                    $active = $inMenu ? 'class="active"' : '';
                    
                    $menuID = $k . '_menu';
                    echo '<li ' . $active . '><a href="#' . $menuID . '" ' . $class . ' data-toggle="collapse">'.$title['label'].' <span class="sr-only">(current)</span></a></li>';
                    echo '<ul id="' . $menuID . '" ' . $subClass . '>';                    
                    foreach ($v as $k1 => $v1) {
                        $subActive = ($v1['url'][0] == $rute) ? 'class="active"' : '';                        
                        echo '<li ' . $subActive . '><a href="' . \Yii::$app->urlManager->createUrl($v1['url']) . '">' . $v1['label'] . '</a></li>';
                    }
                    echo '</ul>';                    
                    echo '</ul>';
                }
            ?>
                <!--
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#userMeun" class="collapsed" data-toggle="collapse">权限 <span class="sr-only">(current)</span></a></li>
                <ul id="userMeun" class="collapse">
                <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['rbac/assignment']); ?>">权限赋予</a></li>
                <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['rbac/permission']); ?>">权限</a></li>
                <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['rbac/role']); ?>">角色</a></li>
                <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['rbac/rule']); ?>">规则</a></li>
                </ul>
              </ul>
              <ul class="nav nav-sidebar">
                <li><a href="">Nav item</a></li>
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
                <li><a href="">More navigation</a></li>
              </ul>
              <ul class="nav nav-sidebar">
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
              </ul>-->
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
               
                <footer class="footer">
                    
                    <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                    <p class="pull-right"><?= Yii::powered() ?></p>
                    
                </footer>
                
            </div>
          </div>
        </div>

   
        
        
        
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
