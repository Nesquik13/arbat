<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m220714_130500_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'user_id_from' => $this->integer()->notNull(),
            'user_id_to' => $this->integer()->notNull(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
//        $this->addForeignKey(
//            'fk_message_user',
//            'message',
//            'user_id',
//            'user',
//            'id',
//            'CASCADE'
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('fk_message_user', 'message');
        $this->dropTable('{{%message}}');
    }
}
