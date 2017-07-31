<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Department */

$this->title = 'Create Department';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="col-sm-3 col-xs-12 text-center">
    <i class="big-icon fa-5x ion ion-briefcase text-center"></i>
    </div>
    <div class="col-sm-9 col-xs-12">
    	<?= $this->render('_form', [
	        'modelDepartment' => $modelDepartment,
    	]) ?>
    	</div>

</div>
