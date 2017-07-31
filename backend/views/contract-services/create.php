<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\contract\ContractServices */

$this->title = 'Create Contract Services';
$this->params['breadcrumbs'][] = ['label' => 'Contract Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-services-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<?php $model->id_contract_services_status = 1?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
