<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\attendance\AttendanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attendances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Attendance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_attendance',
            'id_employees',
            'attendance_startdate',
            'attendance_enddate',
            'id_attendance_type',
            // 'total_days',
            // 'vacation',
            // 'siickleave',
            // 'casual',
            // 'bereavement',
            // 'nocontact',
            // 'late',
            // 'other',
            // 'remarks',
            // 'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
