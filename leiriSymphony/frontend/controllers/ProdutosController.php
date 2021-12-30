<?php

namespace frontend\controllers;

use common\models\Categorias;
use common\models\Marcas;
use common\models\Produtos;
use common\models\ProdutosSearch;
use common\models\Subcategorias;
use common\models\Carrinho;
use common\models\Produtosfavoritos;
use phpDocumentor\Reflection\Types\Array_;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdutosController implements the CRUD actions for Produtos model.
 */
class ProdutosController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Produtos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $marcas = Marcas::find()->all();
        $categorias = Categorias::find()->all();
        $subcategorias = Subcategorias::find()->all();

        if (!isset($_GET["Categoria"]) && !isset($_GET["Marca"]) && !isset($_GET["Subcategoria"]) && !isset($_GET["nome"])) {
            $produtos = Produtos::find()->all();
        } else {
            $whereCondition = null;
            if(isset($_GET["Categoria"])) {
                $categoriaId = $_GET["Categoria"];
                $whereCondition = ['idcategoria' => $categoriaId];
            }
            if(isset($_GET["Marca"])){
                $marcaId = $_GET["Marca"];
                if($whereCondition != null){
                    $whereCondition += ['idmarca' => $marcaId];
                }
                else {
                    $whereCondition = ['idmarca' => $marcaId];
                }
            }
            if(isset($_GET["Subcategoria"])){
                $subcategoriaId = $_GET["Subcategoria"];
                if($whereCondition != null){
                    $whereCondition += ['idsubcategoria' => $subcategoriaId];
                }
                else {
                    $whereCondition = ['idsubcategoria' => $subcategoriaId];
                }
            }
            if(isset($_GET["nome"])){
                $nome = $_GET["nome"];
                if($whereCondition != null){
                    $whereCondition += ['nome' => $nome];
                }
                else {
                    $whereCondition = ['like', 'produtos.nome', '%'. $nome . '%', false];
                }
            }

            $produtos = Produtos::find()->innerJoinWith('idsubcategoria0')->where($whereCondition)->all();
        }

        return $this->render('index', [
            'produtos' => $produtos,
            'marcas' => $marcas,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
        ]);
    }

    /**
     * Displays a single Produtos model.
     * @param int $produtoId Produto ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($produtoId)
    {
        $iduser = Yii::$app->user->id;
        $existeFavorito = Produtosfavoritos::find()->where(['idproduto' => $produtoId])->andWhere(['idperfil' => $iduser])->exists();
        return $this->render('view', [
            'model' => $this->findModel($produtoId),
            'existeFavorito' => $existeFavorito,
        ]);
    }

    public function actionAdicionarCarrinho($idproduto){
        $produtoExist = Produtos::find()->where(['id' => $idproduto])->exists();
        $carrinhoExist = Carrinho::find()->where(['idperfil' => Yii::$app->user->id])->andWhere(['idproduto' => $idproduto])->exists();
        if($produtoExist && !$carrinhoExist){
            $carrinho = new Carrinho();
            $carrinho->idproduto = $idproduto;
            $carrinho->idperfil = Yii::$app->user->id;
            $carrinho->quantidade = 1;
            if($carrinho->validate() && $carrinho->save()){
                Yii::$app->session->setFlash('success', "Produto adicionado ao carrinho");
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        else {
            if($produtoExist && $carrinhoExist){
                $carrinho = Carrinho::find()->where(['idperfil' => Yii::$app->user->id])->andWhere(['idproduto' => $idproduto])->one();
                $carrinho->quantidade += 1;
                if($carrinho->validate() && $carrinho->save()){
                    Yii::$app->session->setFlash('success', "Quantidade do produto incrementada no carrinho (+1)");
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }
        }
        Yii::$app->session->setFlash('error', "Este produto não existe");
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDeleteCarrinho($idproduto)
    {
        $exists = Carrinho::find()->where(['idproduto' => $idproduto])->andWhere(['idperfil' => Yii::$app->user->id])->exists();
        if ($exists){
            Carrinho::find()->where(['idperfil' => Yii::$app->user->id])->andWhere(['idproduto' => $idproduto])->one()->delete();
            Yii::$app->session->setFlash('success', "Produto removido do carrinho com sucesso.");
        }else{
            Yii::$app->session->setFlash('error', "Erro, este produto não se encontra no carrinho");
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Produtos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $produtoId Produto ID
     * @return Produtos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($produtoId)
    {
        if (($model = Produtos::findOne($produtoId)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
