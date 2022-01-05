<?php

namespace frontend\controllers;

use app\models\User;
use common\models\Carrinho;
use common\models\Categorias;
use common\models\Encomendas;
use common\models\Encomendasprodutos;
use common\models\Eventos;
use common\models\Eventosperfis;
use common\models\Pedidosdecontacto;
use common\models\Perfis;
use common\models\Produtosfavoritos;
use common\models\Tipoinformacoes;
use frontend\models\PagamentoOnline;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Produtos;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
     * @return mixed
     */
    public function actionIndex()
    {
        $evento = Eventos::find()->where(['>', 'data', date('Y-m-d')])->orderBy(['data' => SORT_ASC])->one();
        $produtos = Produtos::find()->addOrderBy(['id' => SORT_DESC])->limit(4)->all();

        if($evento === null) {
            return $this->render('index', [
                'produtos' => $produtos,
            ]);
        }
        else {
            return $this->render('index', [
                'produtos' => $produtos,
                'evento' => $evento
            ]);
        }
    }


    /**
     * Displays comprar page.
     *
     * @return mixed
     */
    public function actionComprar()
    {
        $produtosCarrinho = Carrinho::find()->where(['idperfil' => Yii::$app->user->id])->all();
        $perfil = Perfis::findOne(Yii::$app->user->id);
        $pagamentoOnline = new PagamentoOnline();
        $erroCartao = false;
        $erroEncomendaProduto = false;



        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', "É necessário fazer login para realizar compras.");
        } else {
            if($this->request->isPost){
                $pagamentoOnline->load($this->request->post());
                $encomenda = new Encomendas();
                $encomenda->idperfil = $perfil->id;
                $preco = 0;

                if($_POST["entrega"] == "Envio"){
                    $perfil = Perfis::find()->where(['iduser' => Yii::$app->user->id])->one();

                    if($perfil->endereco == null || $perfil->cidade == null || $perfil->telefone == null || $perfil->codigopostal == null){
                        Yii::$app->session->setFlash('error', "O seu perfil não tem uma morada ou numero de telefone, atualize o seu perfil para que esta compra possa ser entregue por correio");
                        return $this->redirect(Yii::$app->request->referrer);
                    }

                }

                foreach($_POST as $post){
                    if(isset($post["quantidade"]) && isset($post["id"])){

                        $produtoParaCarrinho = Produtos::findOne($post["id"]);
                        if($produtoParaCarrinho->stock < $post["quantidade"]){
                            Yii::$app->session->setFlash('error', "A loja não tem stock para realizar esta compraa");
                            return $this->redirect(Yii::$app->request->referrer);
                        }
                        $preco += ($produtoParaCarrinho->preco * $post["quantidade"]);
                    }
                }
                $encomenda->preco = $preco;
                $encomenda->tipoexpedicao = addslashes($_POST["entrega"]);
                $encomenda->estado = 'Em Processamento';
                $encomenda->data = date('Y-m-d');

                if($this->request->post('pagamento') == 'pagamentoloja') {
                    $encomenda->pago = 0;
                }
                else {
                    if($pagamentoOnline->validate()) {
                        $encomenda->pago = 1;
                    }
                    else{
                        $erroCartao = true;
                    }
                }

                if($encomenda->validate() && $encomenda->save()){
                    foreach($_POST as $post){
                        if(isset($post["quantidade"]) && isset($post["id"])){
                            $encomendaProduto = new Encomendasprodutos();
                            $produto = Produtos::findOne($post["id"]);
                            $encomendaProduto->idencomenda = $encomenda->id;
                            $encomendaProduto->idproduto = $produto->id;
                            $encomendaProduto->quantidade = $post["quantidade"];
                            if($encomendaProduto->validate()) {
                                $encomendaProduto->save();
                                $produto->stock = ($produto->stock - $post["quantidade"]);
                                $produto->save();
                            }
                            else{
                                $erroEncomendaProduto = true;
                            }
                        }
                    }
                }

                if(!$erroEncomendaProduto && !$erroCartao){
                    $this->redirect('sucesso');
                }
                else{
                    return $this->render('comprar', [
                        'model' => $produtosCarrinho,
                        'perfil' => $perfil,
                        'pagamentoOnline' => $pagamentoOnline,
                        'erro' => 'falhou',
                    ]);
                }
            }
            return $this->render('comprar', [
                'model' => $produtosCarrinho,
                'perfil' => $perfil,
                'pagamentoOnline' => $pagamentoOnline,
            ]);
        }

        return $this->redirect(Yii::$app->request->referrer);
    }


    /**
     * Displays Sucesso page.
     *
     * @return mixed
     */
    public function actionSucesso()
    {
        return $this->render('sucesso');
    }


    /**
     * Displays eventos page.
     *
     * @return mixed
     */
    public function actionEventos()
    {
        $eventos = Eventos::find()->orderBy(['data' => SORT_ASC])->one();
        $registos = Eventosperfis::find()->where(['idevento' => $eventos->id])->all();
        $lugaresRestantes = ($eventos->lotacao - count($registos));

        return $this->render('evento', [
            'model' => $eventos,
            'lugaresRestantes' => $lugaresRestantes,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        $this->layout = 'blank';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $pedidoDeContacto = new Pedidosdecontacto();
        $tipoInformacoes = Tipoinformacoes::find()->all();

        if ($pedidoDeContacto->load(Yii::$app->request->post())) {
            $pedidoDeContacto->idperfil = Yii::$app->user->id;
            if($pedidoDeContacto->save()){
                Yii::$app->session->setFlash('success', 'A sua mensagem foi enviada com sucesso, em breve entraremos em contacto pelo email indicado.');
            }
            else{
                Yii::$app->session->setFlash('error', 'Houve um erro a enviar a sua mensagem, por favor, tente contactar-nos por outro meio.');
            }


        }
        return $this->render('contact', [
            'model' => $pedidoDeContacto,
            'tipoInformacoes' => $tipoInformacoes
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        $signup = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }


        $this->layout = 'blank';

        return $this->render('signup', [
            'model' => $model,
            'signup' => $signup
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
