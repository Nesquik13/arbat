<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m220704_143737_create_fake_users
 */
class m220704_143737_create_fake_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $us = new User();
        $us->name = 'Viktor';
        $us->surname = 'Belyakov';
        $us->password = '1234';
        $us->phone = '8999-101-73-03';
        $us->email = 'viktorbelyakov95@mail.ru';
        $us->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220704_143737_create_fake_users cannot be reverted.\n";

        return false;
    }

}
