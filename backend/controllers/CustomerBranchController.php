<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use backend\models\customer\CustomerBranch;
use backend\models\customer\CustomerBranchSearch;
use backend\models\customer\Customer;
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
 * CustomerBranchController implements the CRUD actions for CustomerBranch model.
 */
class CustomerBranchController extends Controller
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
     * Lists all CustomerBranch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerBranchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomerBranch model.
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
     * Creates a new CustomerBranch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CustomerBranch();
        $modelCustomer = new Customer();


        if ($model->load(Yii::$app->request->post())) {
            if ($model->id_customer_branch_status == 1){
                    $model->id_customer_branch_status = 1;
            }
             if ($model->id_customer_branch_status == 0){
                    $model->id_customer_branch_status = 2;
            }
           $model->customer_branch_created = date('Y-m-d h:m:s');
           if($model->file = UploadedFile::getInstance($model, 'file')){
            $customerName = Customer::findOne($model->id_customer);
                    $imageName = $customerName->customer_name.'_'.$model->id_customer;
                    $imageThumb = 'thumb_'.$imageName;

                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    $path = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageName.'.'.$model->file->extension;
                    $pathThumb = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageThumb.'.'.$model->file->extension;
                    $imageThumb = '/uploads/customer/'.$imageThumb.'.'.$model->file->extension;
                    
                    //$model->file->saveAs($path);
                    //save the path in the db
                    
                    if ($model->upload())
                        {

                        }
                    $model->image = $imageThumb;
                }
                    $model->save();
            return $this->redirect(['view', 'id' => $model->id_customer_branch]);
          
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelCustomer'=>$modelCustomer,
            ]);
        }
    }

    public function actionCreatemodal()
    {
        $modelCustomer = new Customer();
        $model = new CustomerBranch();

            if ($modelCustomer->load(Yii::$app->request->post())) {
            if ($modelCustomer->customer_status == 1){
                    $modelCustomer->customer_status = 1;
            }
             if ($modelCustomer->customer_status == 0){
                    $modelCustomer->customer_status = 2;
            }


            $modelCustomer->customer_created = date('Y-m-d h:m:s');

            if($modelCustomer->file = UploadedFile::getInstance($modelCustomer, 'file')){
                    $imageName = $modelCustomer->customer_name.'_'.$modelCustomer->id_customer;
                    $imageThumb = 'thumb_'.$imageName;

                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    $path = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageName.'.'.$modelCustomer->file->extension;
                    $pathThumb = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageThumb.'.'.$modelCustomer->file->extension;
                    $imageThumb = '/uploads/customer/'.$imageThumb.'.'.$modelCustomer->file->extension;
                    
                    //$model->file->saveAs($path);
                    //save the path in the db
                    
                    if ($modelCustomer->upload())
                        {

                        }
                    $modelCustomer->image = $imageThumb;
                }
            if($modelCustomer->save()){
                    echo 1;
                }else{
                    echo 0;
                }

            /*$modelCustomer->save();
            return $this->renderAjax('create', [
                'modelCustomer'=>$modelCustomer,
                'model'=>$model,
            ]);*/
            //Yii::$app->session->setFlash('success', "Your message to display");
            //return $this->redirect(['view', 'id' => $modelCustomer->id_customer]);
        } else {
                return $this->renderAjax('createmodal', [
                'modelCustomer'=>$modelCustomer,
                'model'=>$model,
            ]);
            Yii::$app->session->setFlash('error', "Your message to display");
            ;
            //Yii::$app->getSession()->setFlash('error', "An error ocurred when saving new customer");
        }
    }

    /**
     * Updates an existing CustomerBranch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelCustomer = Customer::findOne($model->id_customer);

         if ($model->load(Yii::$app->request->post())){//} && $modelCustomer->load(Yii::$app->request->post())) {
            if ($model->id_customer_branch_status == 1){
                    $model->id_customer_branch_status = 1;
            }
             if ($model->id_customer_branch_status == 0){
                    $model->id_customer_branch_status = 2;
            }
            $model->customer_branch_created = date('Y-m-d h:m:s');

           /*if($modelCustomer->file = UploadedFile::getInstance($modelCustomer, 'file')){
                    $imageName = $modelCustomer->customer_name.'_'.$modelCustomer->id_customer;
                    $imageThumb = 'thumb_'.$imageName;

                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    $path = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageName.'.'.$modelCustomer->file->extension;
                    $pathThumb = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageThumb.'.'.$modelCustomer->file->extension;
                    $imageThumb = '/uploads/customer/'.$imageThumb.'.'.$modelCustomer->file->extension;
                    
                    //$model->file->saveAs($path);
                    //save the path in the db
                    
                    if ($modelCustomer->upload())
                        {

                        }
                    $modelCustomer->image = $imageThumb;
                }*/

                if($model->file = UploadedFile::getInstance($model, 'file')){
                    $imageName = $model->customer_branch_name.'_'.$model->id_customer;
                    $imageThumb = 'thumb_'.$imageName;

                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    $path = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageName.'.'.$model->file->extension;
                    $pathThumb = $_SERVER['DOCUMENT_ROOT'].'uploads/customer/'.$imageThumb.'.'.$model->file->extension;
                    $imageThumb = '/uploads/customer/'.$imageThumb.'.'.$model->file->extension;
                    
                    //$model->file->saveAs($path);
                    //save the path in the db
                    
                    if ($model->upload())
                        {

                        }
                    $model->image = $imageThumb;
                }
            if ($model->validate() && $modelCustomer->validate()) {
                $modelCustomer->save();
                $model->save();
           };
                       return $this->redirect(['view', 'id' => $model->id_customer_branch]);
            
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelCustomer'=> $modelCustomer,
            ]);
        }
    }

    /**
     * Deletes an existing CustomerBranch model.
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
     * Finds the CustomerBranch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerBranch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CustomerBranch::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /* Find Customers on dataCustomerbase*/
    public function actionCustomerBranchList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id_customer_branch AS id, customer_branch_name AS text, image AS image')
                ->from('customer_branch')
                ->where(['like', 'customer_branch_name', $q])
                ->limit(20);
            $command = $query->createCommand();
            $dataCustomer = $command->queryAll();
            $out['results'] = array_values($dataCustomer);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => CustomerBranch::find($id)->customer_branch_name];
        }elseif(is_null($q)){
            $query = new Query;
            $query->select('id_customer_branch AS id, customer_branch_name AS text, image AS image')
                ->from('customer_branch')
                ->limit(20);
            $command = $query->createCommand();
            $dataCustomer = $command->queryAll();
            $out['results'] = array_values($dataCustomer);
        }
        return $out;
    }

    public function  actionCustomerBranchListDependent() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = CustomerBranch::find()->andWhere(['id_customer'=>$id])->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $account) {
                    $out[] = ['id' => $account['id_customer'], 'name' => $account['customer_branch_name']];
                    if ($i == 0) {
                        $selected = $account['id_customer'];
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