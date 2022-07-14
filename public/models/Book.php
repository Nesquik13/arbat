<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property $tittle
 * @property $author
 * @property $pages
 * @property $age
 * @property $user_id
 *
 * @property User $user
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
            [['tittle', 'author', 'pages', 'age', 'user_id'], 'required']
        ];
    }
    public function attributeLabels()
    {
        return [
            'tittle' => 'Название книги',
            'author' => 'Автор',
            'pages' => 'Кол-во страниц',
            'age' => 'Год издания',
            'user_id' => 'Пользователь',
        ];
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}