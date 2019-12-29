<?php


namespace app\models;


use yii\data\ActiveDataProvider;



class ListView extends Product
{


    public function rules()
    {
        return [
            [['date', 'name', 'content', 'price', 'category', 'category_id'], 'safe']
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
            'date' => $this->date,
            'name' => $this->name,
            'content' => $this->content,
            'price' => $this->price,
            'category_id' => $this->category_id
        ]);



        $query->orderBy('date DESC');


        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content]);


        return $dataProvider;


    }


}

