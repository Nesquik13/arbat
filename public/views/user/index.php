<?php

use app\models\Book;
use app\models\User;
use app\models\UserSearch;
use kartik\date\DatePicker;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch $searchModel
 */
Pjax::begin(['timeout' => 10000]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'name',
        'surname',
//        'password',
        [
            'attribute' => 'phone',
            'format' => 'raw',
            'value' => function($model){
                return Html::tag('span', $model->phone, ['class' => 'badge badge-primary']);
            },
            'options' => [
                'width' => '15%'
            ]
        ],
        'email',
        [
            'attribute' => 'bookTittle',
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
//        'created_at:datetime',
        [
            'attribute' => 'created_at',
            'format' => 'date',
            'value' => 'created_at',
            'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd.MM.yyyy'
                        ],
                        'convertFormat' => true
                    ])
        ],
//        'updated_at:datetime',
        [
            'attribute' => 'updated_at',
            'format' => 'date',
            'value' => 'updated_at',
            'filter' => DatePicker::widget([
                'model' => $searchModel,
                'attribute' => 'updated_at',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd.MM.yyyy'
                ],
                'convertFormat' => true,
            ])
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {up}',
//            'buttons' => [
//                    'up' => function (){
//                        return 'up';
//                    }
//                ]
        ]
    ]
]);
Pjax::end();

