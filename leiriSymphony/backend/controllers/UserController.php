<?php

namespace backend\controllers;

use Yii;
use app\models\User;
use common\models\Perfis;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\UserSearch;
use frontend\models\SignupForm;
use yii\rbac\Role;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use app\controllers\PerfisController;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'create', 'view','update','delete','logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['Administrador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['criarUtilizador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['verUtilizador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarUtilizador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['eliminarUtilizador'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    if (Yii::$app->user->isGuest){
                        Yii::$app->user->loginRequired();
                    } else {
                        throw new ForbiddenHttpException('Você não tem acesso a esta funcionalidade.');
                    }
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'perfil' => Perfis::findOne($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $perfil = new Perfis();
        $signup = new SignupForm();
     

        if ($this->request->isPost) {
            $signup->load($this->request->post());
            if($signup->validate()){
                $signup->signup();
                $user = User::find()->where(['email' => $signup->email])->one();

                $manager = Yii::$app->authManager;

                $item = $manager->getRole($user->getUserRole());
                $item = $item ? : $manager->getPermission($user->getUserRole());
                $manager->revoke($item,$user->id);

                $authorRole = $manager->getRole(addslashes($_POST["Roles"]));
                $manager->assign($authorRole, $user->id);

                $perfil = Perfis::find()->where(['nome' => $signup->username])->orderBy(['id' => SORT_DESC])->one();
                $perfil->load($this->request->post());
                if($perfil->save()) {
                    Yii::$app->session->setFlash('success', 'Utilizador adicionado com sucesso');
                    $this->redirect('index');
                }
            }
            else{
                if($perfil->getErrors() != null) {
                    Yii::$app->session->setFlash('error', $signup->firstErrors);
                }
                if($perfil->getErrors() != null) {
                    Yii::$app->session->setFlash('error', $perfil->firstErrors);
                }
            }
        }

        return $this->render('create', [
            'perfis' => $perfil,
            'signup' => $signup
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $perfis = Perfis::findOne($id);

        if ($this->request->isPost){
            $model->load($this->request->post());

            $manager = Yii::$app->authManager;
            $item = $manager->getRole($model->getUserRole());
            $item = $item ? : $manager->getPermission($model->getUserRole());
            $manager->revoke($item,$model->id);

            $authorRole = $manager->getRole(addslashes($_POST["Roles"]));
            $manager->assign($authorRole, $model->id);

            $perfis->load($this->request->post());
            $perfis->iduser = $model->id;
            if($model->save() && $perfis->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'status' => 'success']);
            }
            else{
                return $this->redirect(['view', 'id' => $model->id, 'status' => 'failed']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'perfis' => $perfis
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        Perfis::find()->where(['iduser' => $id])->one()->delete();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
