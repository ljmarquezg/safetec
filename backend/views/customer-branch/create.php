<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\customer\CustomerBranch */

$this->title = 'Create Customer Branch';
$this->params['breadcrumbs'][] = ['label' => 'Customer Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--div class="customer-branch-create"-->
    <?php $model->id_customer_branch_status = 1?>
    <?= $this->render('_form', [
        'model' => $model,
        'modelCustomer' => $modelCustomer,
    ]) ?>

</div>
    <script type="text/javascript">
    	$('.onoffswitch-checkbox').val('1');
    	$('.onoffswitch-checkbox').attr('checked', 'checked');
    </script>