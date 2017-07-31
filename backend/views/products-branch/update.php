<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsBranch */

$this->title = 'Update Products Branch: ' . $model->id_products_brand;
$this->params['breadcrumbs'][] = ['label' => 'Products Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_products_brand, 'url' => ['view', 'id' => $model->id_products_brand]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-branch-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
