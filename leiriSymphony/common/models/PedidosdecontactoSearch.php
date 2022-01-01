<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pedidosdecontacto;

/**
 * PedidosdecontactoSearch represents the model behind the search form of `common\models\Pedidosdecontacto`.
 */
class PedidosdecontactoSearch extends Pedidosdecontacto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idproblema', 'idperfil'], 'integer'],
            [['mensagem', 'email'], 'safe'],
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
        $query = Pedidosdecontacto::find();

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
            'id' => $this->id,
            'idproblema' => $this->idproblema,
            'idperfil' => $this->idperfil,
        ]);

        $query->andFilterWhere(['like', 'mensagem', $this->mensagem])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
