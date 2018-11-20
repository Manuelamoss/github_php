<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Receita;

/**
 * ReceitaSearch represents the model behind the search form of `common\models\Receita`.
 *
 */
class ReceitaSearch extends Receita
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_categoria'], 'integer'],
            [['nome', 'tempo_preparo', 'descricao_preparo'], 'safe'],
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
        $query = Receita::find();

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
            'id_categoria' => $this->id_categoria,
        ]);

        $palavras = explode(" ", $this->descricao_preparo);
        //andFilterWhere para pesquisar somente dentro de cada receita
        foreach ($palavras as $key) {
            $query->orFilterWhere(
                ['like', 'descricao_preparo', $key]
            );
        }

        //$query->orFilterWhere(['like', 'descricao_preparo', $palavras]);

        /*$query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'tempo_preparo', $this->tempo_preparo])
            //->andFilterWhere(['like', 'descricao_preparo',$this->ingredientes ]);
            ->andFilterWhere(['like', 'descricao_preparo', $this->ingredientes[0]])
            ->andFilterWhere(['like', 'descricao_preparo', $this->ingredientes[1]])
            ->andFilterWhere(['like', 'descricao_preparo', $this->ingredientes[2]]);*/

        return $dataProvider;
    }
}
