<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\attendance\AttendancePeriod */

$this->title = 'Create Attendance Period';
$this->params['breadcrumbs'][] = ['label' => 'Attendance Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-period-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
