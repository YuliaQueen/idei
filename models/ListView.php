<?php


namespace app\models;


use yii\data\ActiveDataProvider;
use app\models\Product;

class ListView extends Product
{

    public function rules()
    {
        return [
            [['name', 'content', 'price'], 'safe']
        ];
    }

    public function search($params)
    {
        $query = static::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'name' => $this->name,
            'content' => $this->content,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }


}