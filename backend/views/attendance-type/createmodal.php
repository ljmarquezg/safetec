<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AttendanceType */

$this->title = 'Create Attendance Type';
$this->params['breadcrumbs'][] = ['label' => 'Attendance Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
