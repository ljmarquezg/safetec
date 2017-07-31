<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\contract\Contract */

$this->title = 'Create Contract';
$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-create">

    <!--h1><?= Html::encode($this->title) ?></h1-->
    <?php $modelContract->id_contract_status = 1?>
    <?= $this->render('_formmodal', [
        'modelContract' => $modelContract,
    ]) ?>

</div>
