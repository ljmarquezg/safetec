<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\customer\Customer */

$this->title = 'Update Customer: <br><p>' . $model->customer_name. '</p>';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_customer, 'url' => ['view', 'id' => $model->id_customer]];
$this->params['breadcrumbs'][] = 'Update';
$customer_image =  Yii::$app->params['customer_image'];
?>
<div class="customer-update">

	<!--h1><?= $this->title ?></h1-->
	<?= $this->render('_form', [
		'model' => $model,
		]) ?>

	</div>
