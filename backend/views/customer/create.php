<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\customer\Customer */

$this->title = 'Create Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$customer_image =  Yii::$app->params['customer_image'];
$imagePath = $customer_image;
?>
<div class="customer-create">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
