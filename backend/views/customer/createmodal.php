<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\customer\Customer */

$this->title = 'Create Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-create">

    <?= $this->render('_formmodal', [
        'modelCustomer' => $modelCustomer,
    ]) ?>

</div>
