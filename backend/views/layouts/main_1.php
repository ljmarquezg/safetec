<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

DashboardAsset::register($this);
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

    <!--link rel="stylesheet"  type="text/css" href="css/font-awesome.css">

    <link rel="stylesheet"  type="text/css" href="css/bootstrap/css/bootstrap.min.css'">

    <link rel="stylesheet"  type="text/css" href="css/bootstrap-datepicker3.css">

    <link rel="stylesheet"  type="text/css" href="css/bootstrap-select.min.css">
    
    <link rel="stylesheet"  type="text/css" href="css/toggle-switch.css">

    <link rel="stylesheet"  type="text/css" href="css/inputforms.css">

    <link rel="stylesheet"  type="text/css" href="css/menu.css">
    
    <link rel="stylesheet"  type="text/css" href="css/style.css">
    <link rel="stylesheet"  type="text/css" href="css/gridview.css"-->

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
            'label' => 'Attendance',
            'items' => [
                 ['label' => 'New Attendance', 'url' => '/attendance/create'],
                 /*['label' => 'New Division', 'url' => '/customers-branch/create'],*/
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Attendance Lists</li>',
                 ['label' => 'Attendance', 'url' => '/attendance/'],
                 /*['label' => 'Branch', 'url' => '/customers-branch/'],*/
            ],
        ],

        ['label' => 'Employees',
            'items' => [
                 ['label' => 'New Employee', 'url' => '/employees/create'],
                '<li class="divider"></li>',
                 '<li class="dropdown-header">Employee Lists</li>',
                ['label' => 'Employees List', 'url' => '/employees/'],
            ],
        ],

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
            <?php /*<?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>*/?>
                <?= Alert::widget() ?>
                
            </div>
            <?= $content ?>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
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
});
</script>
<script>

</script>

<script type="text/javascript">



/*window.onload = function() {
    alert('as');
   // function AgregarLineaDeTexto() {
        $(".onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')  // Agrego nueva linea antes
    $.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
        };
   $('.onoffswitch-checkbox').on('click',function () {
    var id= $(this).attr('id')
    //var status = $('[data-status="'+id+'"]').get();
    //alert(status);
    if($('#'+id).hasAttr('checked')) {
        this.setAttribute("checked", ""); // For IE
        this.removeAttribute("checked"); // For other browsers
        this.checked = false;
        $('#'+id).attr( 'value','2');
    } else {
        this.setAttribute("checked", "checked");
        this.checked = true;
        $('#'+id).attr( 'value','1');
    }
});

}
*/



</script>
    </body>
    </html>
    <?php $this->endPage() ?>
