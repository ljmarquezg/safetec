<?php

namespace backend\controllers;

use Yii;
use backend\models\contract\ContractPeriod;
use backend\models\contract\ContractPeriodSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\db\Query;

/**
 * ContractPeriodController implements the CRUD actions for ContractPeriod model.
 */
class ContractPeriodController extends Controller
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
     * Lists all ContractPeriod models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContractPeriodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ContractPeriod model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ContractPeriod model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ContractPeriod();

        if ($model->load(Yii::$app->request->post()) ) {
             $model->created_date = date('Y-m-d');
             $model->save();
            return $this->redirect(['view', 'id' => $model->id_contract_period]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ContractPeriod model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_date = date('Y-m-d');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_contract_period]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ContractPeriod model.
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
     * Finds the ContractPeriod model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContractPeriod the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContractPeriod::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }




    public function actionContractPeriodList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id_contract_period AS id, contract_period AS text, contract_period_month AS value, ')
                ->from('contract_period')
                ->where(['like', 'contract_period', $q])
                ->limit(20);
            $command = $query->createCommand();
            $dataContractPeriod = $command->queryAll();
            $out['results'] = array_values($dataContractPeriod);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Customer::find($id)->contract_period];
        }elseif(is_null($q)){
            $query = new Query;
            $query->select('id_contract_period AS id, contract_period AS text, contract_period_month AS value, ')
                ->from('contract_period')
                ->limit(20);
            $command = $query->createCommand();
            $dataContractPeriod = $command->queryAll();
            $out['results'] = array_values($dataContractPeriod);
        }
        return $out;
    }

    public function actionContractPeriodInfo($id_contract_period) {
        $id_contract_period = ContractPeriod::findOne($id_contract_period);
        echo Json::encode($id_contract_period);
    }

}
