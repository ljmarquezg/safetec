<?php

namespace backend\controllers;

use Yii;
use backend\models\contract\Contract;
use backend\models\contract\ContractSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\db\Query;

/**
 * ContractController implements the CRUD actions for Contract model.
 */
class ContractController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Contract models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContractSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contract model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->id_contract_status =  2;
            if($model->save()){
                echo 1;
            }else{
                echo 0;
            }
            //return $this->render('view', [
            //'model' => $this->findModel($id),
             //]);
        } else {
            return $this->render('view', [
            'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Contract model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contract();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_date =  date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_contract]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreatemodal()
    {
        $modelContract = new Contract();
        
        if ($modelContract->load(Yii::$app->request->post())) {
            $modelContract->created_date =  date('Y-m-d H:i:s');
            $modelContract->save();

            if($modelContract->save()){
                    echo 1;
                }else{
                    echo 0;
                }
            //return $this->redirect(['view', 'id' => $modelContract->id_contract]);
        } else {
            return $this->renderAjax('createmodal', [
                'modelContract' => $modelContract,
            ]);
        }
    }

    public function actionRenew($id_customer, $id_customer_branch, $id_contract_period)
    {
        
        
        $model = new Contract();
        $model->id_customer = $_GET['id_customer'];
        $model->id_customer_branch  = $_GET['id_customer_branch'];
        $model->id_contract_period = $_GET['id_contract_period'];
        
        if ($model->load(Yii::$app->request->post())) {
            $model->created_date =  date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_contract]);
        } else {
            return $this->render('renew', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Contract model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            if ($model->id_contract_status == 1){
                    $model->id_contract_status = 1;
            }
             if ($model->id_contract_status == 0){
                    $model->id_contract_status = 2;
            }

            $model->updated_date =  date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_contract]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contract model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contract model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contract the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contract::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionContractList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id_contract AS id, contract_number AS text, contract_start AS contract_start, contract_expire AS contract_expire')
                ->from('contract')
                ->where(['like', 'contract_number', $q])
                ->limit(20);
            $command = $query->createCommand();
            $dataContract = $command->queryAll();
            $out['results'] = array_values($dataContract);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Customer::find($id)->contract_number];
        }elseif(is_null($q)){
            $query = new Query;
            $query->select('id_contract AS id, contract_number AS text, contract_start AS contract_start, contract_expire AS contract_expire')
                ->from('contract')
                ->limit(20);
            $command = $query->createCommand();
            $dataContractPeriod = $command->queryAll();
            $out['results'] = array_values($dataContract);
        }
        return $out;
    }
    public function  actionCustomerContractListDependent() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = Contract::find()->andWhere(['id_contract'=>$id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id_contract'], 'name' => $account['contract_number']];
                    if ($i == 0) {
                        $selected = $account['id_contract'];
                    }
                }
                // Shows how you can preselect a value
                echo Json::encode(['output' => $out, 'selected'=>$selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected'=>'']);
    }
}
