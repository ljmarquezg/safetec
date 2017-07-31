<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use backend\models\Employees;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AttendanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="attendance-index">

    <!--h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    >
    <p>
        <?= Html::a('Create Attendance', ['../attendance/'], ['class' => 'btn btn-success']) ?>

    </p-->
<?php Pjax::begin()?>

<?php


$gridColumns =[
            ['class' => 'kartik\grid\SerialColumn'],
            //'Attendance_ID',
            //'id_employees',
            'Attendance_StartDate',
            'Attendance_EndDate',
            //'Attendance_Type',
            [
                'attribute'=> 'Attendance_Type',
                'value' => 'attendanceType.Attendance_Description',

            ],

            'TotalDays',
            [
                'attribute'=> 'Vacation',
                'pageSummary' => True,

            ],
            [
                'attribute'=> 'SickLeave',
                'pageSummary' => True,

            ],
            [
                'attribute'=> 'Casual',
                'pageSummary' => True,

            ],
            [
                'attribute'=> 'Bereavement',
                'pageSummary' => True,

            ],
            [
                'attribute'=> 'NoContact',
                'pageSummary' => True,

            ],
            [
                'attribute'=> 'Late',
                'pageSummary' => True,

            ],
            [
                'attribute'=> 'Other',
                'pageSummary' => True,

            ],

            'Remarks',
            // 'Created',

            //['class' => 'yii\grid\ActionColumn'],
        ];

$fullExportMenu = ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'target' => ExportMenu::TARGET_BLANK,
    'fontAwesome' => true,
    'asDropdown' => false, // this is important for this case so we just need to get a HTML list    
    'dropdownOptions' => [
        'label' => '<i class="glyphicon glyphicon-export"></i> Full'
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'showPageSummary' => true,
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Attendance</h3>',
    ],
    // the toolbar setting is default
    'toolbar' => [
        '{export}',
        ['content'=>
         
          /* Html::a('<i class="glyphicon glyphicon-plus"></i>', ['../attendance/create'], ['class' => 'btn btn-success', 'title'=>Yii::t('kvgrid', 'New Attendance')]).' '. */
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
        ],
    ],
    // configure your GRID inbuilt export dropdown to include additional items
    'export' => [
        'fontAwesome' => true,
        'itemsAfter'=> [
            '<li role="presentation" class="divider"></li>',
            '<li class="dropdown-header">Export All Data</li>',
            $fullExportMenu
        ]
    ],
]);
?>
<?php Pjax::end()?>
</div>
