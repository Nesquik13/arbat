<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public $bookTittle;

    public function rules()
    {
        return [
            [['name', 'surname', 'phone', 'email', 'created_at', 'updated_at', 'bookTittle'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        $attributes = array_merge(parent::attributeLabels(), [
            'bookTittle' => 'Название книги'
        ]);
        return $attributes;
    }

    public function search($params)
    {
        $query = self::find()->joinWith('books');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $attributes = array_merge($dataProvider->sort->attributes, [
            'bookTittle' => [
                'asc' => ['book.tittle' => SORT_ASC],
                'desc' => ['book.tittle' => SORT_DESC]
            ]
        ]);
        $dataProvider->sort->attributes = $attributes;

        $this->load($params);
        if(!$this->validate()){
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'surname', $this->surname]);
        $query->andFilterWhere(['like', 'phone', $this->phone]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['between', 'user.created_at', strtotime($this->created_at), strtotime($this->created_at . '+ 1 days')]);
        $query->andFilterWhere(['between', 'user.updated_at', strtotime($this->updated_at), strtotime($this->updated_at . '+ 1 days')]);

        $query->andFilterWhere(['like', 'book.tittle', $this->bookTittle]);

        return  $dataProvider;
    }
}