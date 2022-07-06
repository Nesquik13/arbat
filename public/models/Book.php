<?php

namespace app\models;

use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public function rules()
    {
        return [
            [['tittle', 'author', 'pages', 'age'], 'required']
        ];
    }
    public function attributeLabels()
    {
        return [
            'tittle' => 'Название книги',
            'author' => 'Автор',
            'pages' => 'Кол-во страниц',
            'age' => 'Год издания'
        ];
    }
}