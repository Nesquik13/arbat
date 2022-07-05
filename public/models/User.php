<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $password
 * @property string $phone
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name', 'password', 'phone', 'email'], 'required'],
            [['name', 'surname','password', 'phone', 'email'], 'string'],
            ['email', 'email'],
            ['email', 'unique'],
//            ['phone', 'string', 'min' => 16]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'password' => 'Пароль',
            'phone' => 'Телефон',
            'email' => 'Email',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения'
        ];
    }

}
