<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\attendance\AttendanceTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attendance Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Attendance Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_attendandce_type',
            'attendance_description',
            'attendance_value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
