<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\products\ProductsCategory */

$this->title = 'Create Products Category';
$this->params['breadcrumbs'][] = ['label' => 'Products Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
