<?php
namespace app\controllers;

use Yii;
use app\models\Country;
use yii\data\Pagination;
use app\models\CountrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
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
                    'delete' => [
                        'POST'
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Country models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        
        /*
         * $searchModel = new CountrySearch();
         * $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         *
         * return $this->render('index', [
         * 'searchModel' => $searchModel,
         * 'dataProvider' => $dataProvider,
         * ]);
         */
        // $model=new Country();
        
        /*
         * $query = Country::find();
         *
         * $pagination = new Pagination([
         * 'defaultPageSize' => 15,
         * 'totalCount' => $query->count(),
         * ]);
         *
         * $countrys = $query->orderBy('code')
         * ->offset($pagination->offset)
         * ->limit($pagination->limit)
         * ->all();
         */
        
        // 空的country模型，用于表头（属性）
        $model = new Country();
        // 搜索模型，用于搜索框及rules验证
        $searchModel = new CountrySearch();
        
        // $query = Country::find();
        // 如果首次打开country，则参数为空
        $query = $searchModel->search(Yii::$app->request->post());
        
        // 分页
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count()
        ]);
        
        $countrys = $query->orderBy('code')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        return $this->render('index', [
            'searchModel' => $searchModel, // 用于搜集查询表单数据
            'model' => $model,
            'countrys' => $countrys, // 表格（或查询结果）
            'pagination' => $pagination
        ]);
    }

    /**
     * Displays a single Country model.
     *
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    /**
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Country();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view',
                'id' => $model->code
            ]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if ($id == "") {
            $model = new Country();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect([
                    'update',
                    'id' => $model->code
                ]);
            } else {
                return $this->render('update', [
                    'model' => $model
                ]);
            }
        } else {
            $model = $this->findModel($id);
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect([
                    'view',
                    'id' => $model->code
                ]);
            } else {
                return $this->render('update', [
                    'model' => $model
                ]);
            }
        }
    }

    /**
     * Deletes an existing Country model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect([
            'index'
        ]);
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}