<?php

use app\models\Book;
use app\models\User;
use yii\widgets\DetailView;

/**
 * @var User $model
 */

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'surname',
        'password',
        'phone',
        'email',
        [
            'attribute' => 'books',
            'value' => function($user)
            {
                /** @var User $user */
                $books = [];
                /** @var Book $book */
                foreach ($user->books as $book)
                {
                    $books[] = $book->tittle;
                }
                return implode(', ', $books);
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ]
]);