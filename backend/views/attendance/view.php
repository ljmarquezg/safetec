<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\attendance\Attendance */

$this->title = $model->id_attendance;
$this->params['breadcrumbs'][] = ['label' => 'Attendances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_attendance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_attendance], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_attendance',
            'id_employees',
            'attendance_startdate',
            'attendance_enddate',
            'id_attendance_type',
            'total_days',
            'vacation',
            'sickleave',
            'casual',
            'bereavement',
            'nocontact',
            'late',
            'other',
            'remarks',
            'created_date',
        ],
    ]) ?>

</div>
