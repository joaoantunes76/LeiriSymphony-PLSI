<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produtos;

/**
 * ProdutosSearch represents the model behind the search form of `app\models\Produtos`.
 */
class ProdutosSearch extends Produtos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['produtoId', 'subcategoriaId', 'marcaId', 'digital'], 'integer'],
            [['produtoNome', 'descricao', 'ficheiro'], 'safe'],
            [['preco'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produtos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'produtoId' => $this->produtoId,
            'subcategoriaId' => $this->subcategoriaId,
            'marcaId' => $this->marcaId,
            'digital' => $this->digital,
            'preco' => $this->preco,
        ]);

        $query->andFilterWhere(['like', 'produtoNome', $this->produtoNome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'ficheiro', $this->ficheiro]);

        return $dataProvider;
    }
}
