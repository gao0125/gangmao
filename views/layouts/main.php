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
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>

</head>
<body class="nav-md">
<?php $this->beginBody() ?>
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="<?php echo Yii::$app->request->getHostInfo().Yii::$app->user->returnUrl;?>" class="site_title"><i class="fa fa-paw"></i> <span>后台管理</span></a>
        </div>

        <div class="clearfix"></div>
        

        <!-- menu profile quick info -->
        <div class="profile">
          <div class="profile_pic">
            <img src="../web/images/logo.png" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Welcome,<?= Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->username ?></span>

          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        <?php

        $sideMenuItems = [
            'admin'=>['label' => '管理模块',
                'items' => [
                    ['label' => '权限管理',
                        'items' => [
                            ['label' => '分配角色', 'url' => ['rbac/assignment']],
                            ['label' => '权限列表', 'url' => ['rbac/permission']],
                            ['label' => '角色管理', 'url' => ['rbac/role']],
                        ]
                    ],
                    ['label' =>'管理员管理',
                        'items'=>[
                            ['label'=>'管理员列表','url'=>['user/index']]
                        ],


                    ],
                    ['label' => '用户管理',
                        'items' => [
                            ['label' => '用户信息管理', 'url' => ['frontend-user/index']],
                            ['label' => '用户积分管理', 'url' => ['frontend-user-credit/index']],
                            ['label' => '用户余额管理', 'url' => ['frontend-user-balance/index']],
                            ['label' => '优惠券信息 ', 'url' => ['frontend-user-coupon/index']],
                            ['label' => '用户等级', 'url' => ['m-user-level/index']],
                        ],
                    ],
                    ['label' => '商品管理',
                        'items' => [
                            ['label' => '分类管理', 'url' => ['frontend-cata/index']],
                            ['label' => '产品管理', 'url' => ['frontend-product/index']],
                          // ['label' => '角色管理', 'url' => ['rbac/role']],
                        ]
                    ],
                    ['label' => '商店管理',
                        'items' => [
                            ['label' => '商店管理', 'url' => ['frontend-shop/index']],
                        ],
                    ],
                    ['label' => '广告管理',
                        'items' => [
                            ['label' => '广告管理', 'url' => ['frontend-ad/index']],
                            ['label' => '内容管理', 'url' => ['frontend-ad-content/index']],
                            ['label' => '广告区域管理', 'url' => ['frontend-ad-section/index']],
                        ],
                    ],
                    ['label' => '优惠券管理',
                        'items' => [
                            ['label' => '优惠券统计管理', 'url' => ['frontend-coupon/index']],
                        ],
                    ],
                    ['label' => '新闻管理',
                        'items' => [
                            ['label' => '新闻管理', 'url' => ['frontend-news/index']],
                        ],
                    ],
                    ['label' => '消息管理',
                        'items' => [
                            ['label' => '消息管理', 'url' => ['frontend-user-msg/index']],
                        ],
                    ],
                    ['label' => '订单管理',
                        'items' => [
                            ['label' => '订单管理', 'url' => ['frontend-order/index']],
                            ['label' => '审核企业支付', 'url' => ['frontend-order-payment/index']],
                            ['label' => '维护发货信息', 'url' => ['frontend-order-track/index']],
                            ['label' => '审核退款', 'url' => ['frontend-order-refund/index']],
                            ['label' => '开具发表', 'url' => ['frontend-order-invoice/index']],
                        ],
                    ],
                    ['label' => '订单详情',
                        'items' => [
                            ['label' => '订单详情', 'url' => ['frontend-order-detail/index']],
                        ],
                    ],
                    ['label' => '求购',
                        'items' => [
                            ['label' => '求购', 'url' => ['frontend-demand/index']],
                        ],
                    ],
                    ['label' => '检验管理',
                        'items' => [
                            ['label' => '产品检验管理', 'url' => ['frontend-product-inspection/index']],
                        ],
                    ],
                    ['label' => '物流管理',
                        'items' => [
                            ['label' => '物流管理', 'url' => ['frontend-delivery/index']],
                        ],
                    ],
                    ['label' => '加工管理',
                        'items' => [
                            ['label' => '管理加工信息', 'url' => ['frontend-product-process/index']],
                        ],
                    ],
                    ['label' => '资源管理',
                        'items' => [
                            ['label' => '资源管理', 'url' => ['frontend-resource/index']],
                        ],
                    ],
                    ['label' => '社区管理',
                        'items' => [
                            ['label' => '社区话题分类管理', 'url' => ['frontend-subject/index']],
                            ['label' => '社区话题内容管理', 'url' => ['frontend-subject-content/index']],
                            ['label' => '社区话题评论管理', 'url' => ['frontend-subject-comment/index']],
                        ],
                    ],
                    ['label' => '产品评论',
                        'items' => [
                            ['label' => '产品评论', 'url' => ['frontend-product-comment/index']],
                        ],
                    ],
                    
                    
                    ['label' => '认证管理',
                        'items' => [
                            ['label' => '认证管理', 'url' => ['frontend-user-company/index']],
                        ],
                    ],
                   
                    ['label' => '基表配置管理',
                        'items' => [
                            ['label' => '区域管理', 'url' => ['m-cn-area/index']],
                            ['label' => '物流系统管理', 'url' => ['m-delivery-ratio/index']],

                            ['label' => '检验机构管理 ', 'url' => ['m-inspection/index']],
                            ['label' => '检验方式管理', 'url' => ['m-inspection-method/index']],
                            ['label' => '检验比管理', 'url' => ['m-inspection-ratio/index']],
                            ['label' => '检验标准管理', 'url' => ['m-standard/index']],
                            
                            ['label' => '材质管理 ', 'url' => ['m-material/index']],
                            ['label' => '加工方式管理', 'url' => ['m-process-method/index']],
                            ['label' => '加工系数管理 ', 'url' => ['m-process-ratio/index']],
                            ['label' => '运送方式管理', 'url' => ['m-shipping/index']],
                            ['label' => '积分余额设置项管理 ', 'url' => ['m-subject/index']],
                            ['label' => '单位管理', 'url' => ['m-unit/index']],
                            ['label' => '仓库管理', 'url' => ['m-warehouse/index']],
                            ['label' => '生产厂家', 'url' => ['frontend-manufacturer/index']],
                            ['label' => '反馈管理', 'url' => ['feedback/index?sort=-id']],
                            ['label' => '关于我们', 'url' => ['frontend-info/index?sort=-id']],
                        ],
                    ],
                ],
            ],
//            'user'=>[
//                ['label' => '用户管理',
//                    'items' => [
//                        ['label' => '用户列表', 'url' => ['user']],
//                        ['label' => '创建用户', 'url' => ['user/create']]
//                    ]
//                ],
//
//            ]
        ]
        ?>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

          <?php
          $module = Yii::$app->id == Yii::$app->controller->module->id ? '' :  Yii::$app->controller->module->id . '/';
          $rute = $module . Yii::$app->controller->id . (Yii::$app->controller->action->id == 'index' ? '' : '/' . Yii::$app->controller->action->id);
          $mainModule = $module ? : Yii::$app->controller->id . '/';
          foreach($sideMenuItems as $k => $v) {
            echo '<div class="menu_section">
                     <h3>' . $v['label'] . '</h3>';
            echo '<ul class="nav side-menu" id="navsidemenu">';
            foreach($v['items'] as $k1 => $v1){
              // foreach($v1 as $k2 => $v2){
              echo '<li><a><i class="fa fa-home"></i> ' . $v1['label'] . ' <span class="fa fa-chevron-down"></span></a><ul class="nav child_menu">';
              foreach($v1['items'] as $k2 => $v2){
                echo '<li><a href="' . \Yii::$app->urlManager->createUrl($v2['url']) . '">' . $v2['label'] . '</a></li>';
              }


              echo '</ul></li>';
//                                          <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
//                    <ul class="nav child_menu">
//                      <li><a href="index.php">Dashboard</a></li>
//                      <li><a href="index2.html">Dashboard2</a></li>
//                      <li><a href="index3.html">Dashboard3</a></li>
//                    </ul>
//                  </li>
              //  }

            }
            echo '</ul>';



            echo '</div>';

          }

          function showMenu($menu){
            foreach($menu as $k => $v){

            }
          }

          ?>

        </div>



        <?php
        //                   echo '<ul class="nav nav side-menu">';
        //                    $title = array_shift($v);
        //                    $inMenu = $k . '/' == $mainModule;
        //
        //                    $class =  $inMenu ? '' : 'class="collapsed"';
        //                    $subClass = $inMenu ? 'class="nav-sidebar collapse in"' : 'class="nav-sidebar collapse"';
        //                    $active = $inMenu ? 'class="active"' : '';
        //
        //                    $menuID = $k . '_menu';
        //                    echo '<li ' . $active . '><a href="#' . $menuID . '" ' . $class . ' data-toggle="collapse">'.$title['label'].' <span class="sr-only">(current)</span></a></li>';
        //                    echo '<ul id="' . $menuID . '" ' . $subClass . '>';
        //                    foreach ($v as $k1 => $v1) {
        //                        $subActive = ($v1['url'][0] == $rute) ? 'class="active"' : '';
        //                        echo '<li ' . $subActive . '><a href="' . \Yii::$app->urlManager->createUrl($v1['url']) . '">' . $v1['label'] . '</a></li>';
        //                    }
        //                    echo '</ul>';
        //                    echo '</ul>';

        ?>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="/gangmao_backend1/backend/web/images/img.jpg" alt="">
                <!--                  --><?php //isset($_SESSION['username']) ? $_SESSION['username'] : null;?>
                <!--                  --><?php //isset(Yii::$app->session['username']) ? Yii::$app->session['username'] : null;?>
                <?= Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->username ?>
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:;"> Profile</a></li>
                <li>
                  <a href="javascript:;">
                    <!--                    <span class="badge bg-red pull-right">50%</span>-->
                    <span>设置</span>
                  </a>
                </li>
                <li><a href="javascript:;">帮助</a></li>
                <li><a href="<?=  \yii\helpers\Url::to(['site/logout'],true)?>" data-method="post"><i class="fa fa-sign-out pull-right"></i>退出</a></li>
                <!--                <li><a href="index.php?r=site/logout" ><i class="fa fa-sign-out pull-right"></i>Logout</a></li>-->
              </ul>
            </li>

            <li role="presentation" class="dropdown">
              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-green">6</span>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                <li>
                  <a>
                    <span class="image"><img src="/gangmao_backend1/backend/web/images/img.jpg" alt="Profile Image" /></span>
                    <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="/gangmao_backend1/backend/web/images/img.jpg" alt="Profile Image" /></span>
                    <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="/gangmao_backend1/backend/web/images/img.jpg" alt="Profile Image" /></span>
                    <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <li>
                  <a>
                    <span class="image"><img src="/gangmao_backend1/backend/web/images/img.jpg" alt="Profile Image" /></span>
                    <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                    <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                  </a>
                </li>
                <li>
                  <div class="text-center">
                    <a>
                      <strong>See All Alerts</strong>
                      <i class="fa fa-angle-right"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->


    <div class="right_col" role="main">


      <?= $content ?>

      <footer class="footer">

        <p class="pull-left">&copy; 钢猫 <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>

      </footer>

    </div>
  </div>
</div>
<div id="maskLayer" class="maskLayer" style="display: none;">遮罩层</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script type="text/javascript">
  $(function(){
    $("#navsidemenu ul li a").click(function(){
      $.cookie("navstation", $(this).html(), { path: "/" });
    });
  });
</script>

<script type="text/javascript">
  var navstation = $.cookie("navstation");
  if(navstation != null){
    $("#navsidemenu ul li a").each(function(){
      if($(this).html() == navstation){
        $(this).parent().parent().css("display","block");
      }
    });
  }
</script>
<script type="text/javascript">
  // 基于准备好的dom，初始化echarts实例
  var myChart = echarts.init(document.getElementById('main'));

  // 指定图表的配置项和数据
  var option = {
    title : {
      text: '交易实时',
      subtext: '2017年'
    },
    tooltip : {
      trigger: 'axis'
    },
    legend: {
      data:['订单','交易额']
    },
    toolbox: {
      show : true,
      feature : {
        dataView : {show: true, readOnly: false},
        magicType : {show: true, type: ['line', 'bar']},
        restore : {show: true},
        saveAsImage : {show: true}
      }
    },
    calculable : true,
    xAxis : [
      {
        type : 'category',
        data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
      }
    ],
    yAxis : [
      {
        type : 'value'
      }
    ],
    series : [
      {
        name:'订单',
        type:'bar',
        data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
        markPoint : {
          data : [
            {type : 'max', name: '最大值'},
            {type : 'min', name: '最小值'}
          ]
        },
        markLine : {
          data : [
            {type : 'average', name: '平均值'}
          ]
        }
      },
      {
        name:'交易额',
        type:'bar',
        data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
        markPoint : {
          data : [
            {name : '年最高', value : 182.2, xAxis: 7, yAxis: 183},
            {name : '年最低', value : 2.3, xAxis: 11, yAxis: 3}
          ]
        },
        markLine : {
          data : [
            {type : 'average', name : '平均值'}
          ]
        }
      }
    ]
  };
  // 使用刚指定的配置项和数据显示图表。
  myChart.setOption(option);
</script>

