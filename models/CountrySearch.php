<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

/**
 * CountrySearch represents the model behind the search form about `app\models\Country`.
 */
class CountrySearch extends Country
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'code',
                    'name',
                    'chinesename'
                ],
                'safe'
            ],
            [
                [
                    'population'
                ],
                'integer'
            ]
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
        print("进入contrySearch.php的search函数 \n");
        print_r($params);
        
        $query = Country::find();
        
        // add conditions that should always apply here
        
        /*
         * $dataProvider = new ActiveDataProvider([
         * 'query' => $query,
         * ]);
         */
        
        $this->load($params);
        
        if (! $this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'population' => $this->population
        ]);
        
        $query->andFilterWhere([
            'like',
            'code',
            $this->code
        ])->andFilterWhere([
            'like',
            'name',
            $this->name
        ])->andFilterWhere([
            'like',
            'chinesename',
            $this->chinesename
        ]);
        
        return $query;
    }

    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
