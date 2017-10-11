<?php
namespace common\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * ShopSearch represents the model behind the search form of `app\models\Shop`.
 */
class ShopSearch extends Shop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_owner_id', 'shop_number'], 'integer'],
            [['shop_owner_names', 'shop_address', 'shop_email', 'shop_phone', 'description', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Shop::find();

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
            'shop_owner_id' => $this->shop_owner_id,
            'shop_number' => $this->shop_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'shop_owner_names', $this->shop_owner_names])
            ->andFilterWhere(['like', 'shop_address', $this->shop_address])
            ->andFilterWhere(['like', 'shop_email', $this->shop_email])
            ->andFilterWhere(['like', 'shop_phone', $this->shop_phone])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
