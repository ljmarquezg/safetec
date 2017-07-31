<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

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

    <link rel="stylesheet"  type="text/css" href="css/font-awesome.css">

    <link rel="stylesheet"  type="text/css" href="css/bootstrap/css/bootstrap.min.css'">

    <link rel="stylesheet"  type="text/css" href="css/bootstrap-datepicker3.css">

    <link rel="stylesheet"  type="text/css" href="css/bootstrap-select.min.css">
    
    <link rel="stylesheet"  type="text/css" href="css/toggle-switch.css">

    <link rel="stylesheet"  type="text/css" href="css/inputforms.css">

    <link rel="stylesheet"  type="text/css" href="css/menu.css">
    
    <link rel="stylesheet"  type="text/css" href="css/style.css">


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
        [
            'label' => 'Customers',
            'items' => [
                 ['label' => 'New Customer', 'url' => '/customers/create'],
                 /*['label' => 'New Division', 'url' => '/customers-branch/create'],*/
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Customer Lists</li>',
                 ['label' => 'Customers', 'url' => '/customers/'],
                 /*['label' => 'Branch', 'url' => '/customers-branch/'],*/
            ],
        ],

        ['label' => 'Technicians',
            'items' => [
                 ['label' => 'New Employee', 'url' => '/employees/create'],
                '<li class="divider"></li>',
                 '<li class="dropdown-header">Employee Lists</li>',
                ['label' => 'Employees List', 'url' => '/employess/'],
            ],
        ],

        ['label' => 'Stock',
            'items' => [
                 ['label' => 'Create Stock', 'url' => '/stock/create'],
                '<li class="divider"></li>',

                 '<li class="dropdown-header">Stock Lists</li>',
                ['label' => 'Stock List', 'url' => '/stock/'],
            ],
        ],

        /*['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Home', 'url' => ['/site/index']],*/

        ];
        if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
            ]);
        NavBar::end();
        ?>
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
        <script>
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), date.getHours(), date.getMinutes(), date.getSeconds(), -4);
    alert(now);
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        forceParse: false,
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        todayBtn: true,
        
    });
</script>
<!-- Smooth scroll-->
<script>
$('a[href^="#"]').on('click',function (e) {
        e.preventDefault();
        var target = this.hash;
        var dataHash = $(this).attr("data-hash");
        $(this).addClass('current');
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop':  $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target; 

        });
    });

</script>

<!--start datepicker-->
<script>
    var today = new Date();
    
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        startDate: today,
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        todayBtn: "linked",
    });
</script>

<script>
var $ = jQuery.noConflict();

$('.onoffswitch-checkbox').on('click',function(e){
            var elem = $(this).attr('id')
            //alert ('e');
})
</script>
    </body>
    </html>
    <?php $this->endPage() ?>
