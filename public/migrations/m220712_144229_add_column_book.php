<?php

use app\models\Book;
use yii\db\Migration;

/**
 * Class m220712_144229_add_column_book
 */
class m220712_144229_add_column_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(Book::tableName(), 'user_id', $this->integer());
        $this->addForeignKey(
            'fk_book_user',
            'book',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_book_user', Book::tableName());
        $this->dropColumn(Book::tableName(), 'user_id');
    }

}
