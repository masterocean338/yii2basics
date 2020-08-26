<?php

namespace app\controllers;

use Yii;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\web\Controller;
use yii\web\Response;

use yii\data\Pagination;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Userinfo;
use app\models\ClientSearch;
use app\models\Client;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','login','contact','hello','info','grid'],
                'rules' => [
                    [
                        'actions' => ['logout','contact','hello','info','grid'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login','about'],
                        'allow' => true,
                        'roles' => ['?'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionHello(){
        return $this->render('hello');
     }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
            /*return $this->render('hello');*/
        }


        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionSignup(){
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()){
            Yii::$app->session->addFlash('success', 'You have successfully registered,Please LogIn');
           // return $this->redirect(Yii::$app->homeUrl);
           return $this->redirect('/site/login');
        }

        return $this->render('signup', [
            'model' => $model
        ]);
    }




    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionInfo()
    {
        $query = Userinfo::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $userinfo = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('info', [
            'userinfo' => $userinfo,
            'pagination' => $pagination,
        ]);
    }
    public function actionGrid(){
        return $this->render('grid');
    }
    public function actionList(){
        $searchModel= new ClientSearch();
        $dataProvider= $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
        //return $this->render('list');
    }
    public function actionSearch(){
        $searchModel= new ClientSearch();
        $dataProvider= $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('search',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
        /*return $this->render('search');*/

    }
    public function actionView($id){
        return $this->render('view',[
            'model'=>$this->findModel($id),
        ]);

    }
    protected function findModel($id){
        if(($model = Client::findOne($id))!== null){
            return $model;
        }
        else{
            throw new NotFoundHttpException("The requested Page does not exist!");
        }
    }
}
