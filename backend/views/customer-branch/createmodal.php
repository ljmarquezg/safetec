<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranch */

$this->title = 'Create Customer Branch';
$this->params['breadcrumbs'][] = ['label' => 'Customer Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-branch-create">
    <?php $modelCustomer->id_customer_status = 1?>

    <?= $this->render('_formmodal', [
        'modelCustomer' => $modelCustomer,
        'model'=>$model,
    ]) ?>

</div>
    <script type="text/javascript">
    	$('.onoffswitch-checkbox').val('1');
    	$('.onoffswitch-checkbox').attr('checked', 'checked');
    </script>