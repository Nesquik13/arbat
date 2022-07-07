<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class BookSearch extends Book
{
    public function rules()
    {
        return [
            [['tittle', 'author', 'pages', 'age'], 'safe']
        ];
    }

    public function search($params)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);
        $this->load($params);
        if(!$this->validate()){
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'tittle', $this->tittle]);
        $query->andFilterWhere(['like', 'author', $this->author]);
        $query->andFilterWhere(['=', 'pages', $this->pages]);
        $query->andFilterWhere(['=', 'age', $this->age]);

        return $dataProvider;
    }
}