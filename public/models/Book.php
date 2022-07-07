<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property $tittle
 * @property $author
 * @property $pages
 * @property $age
 */
class Book extends ActiveRecord
{
    public static function tableName()
    {
        return 'book';
    }

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