<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
/**
 * @property integer $id
 * @property integer $user_id_to
 * @property integer $user_id_from
 * @property string $message
 * @property integer $created_at
 * @property integer $updated_at
 *
 *
 * @property User $userTo
 * @property User $userFrom
 */
class Message extends ActiveRecord
{
    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }

    public function rules(): array
    {
        return [
            [['user_id_from','user_id_to', 'message'], 'required'],
            [['user_id_from','user_id_to'], 'integer', 'min' => 1],
            ['message', 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public static function tableName(): string
    {
        return 'message';
    }

    public function attributeLabels(): array
    {
        return
        [
            'user_id_to' => 'Отправитель',
            'user_id_from' => 'Получатель',
            'message' => 'Сообщение',
            'created_at' => 'Дата отправления',
            'updated_at' => 'Дата изменения',
        ];
    }

    public function getUserTo(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id_to']);
    }

    public function getUserFrom(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id_from']);
    }
}