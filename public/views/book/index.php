<?php

use app\models\Book;
use app\models\BookSearch;
use app\widgets\BookListWidget;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var ActiveDataProvider $dataProvider
 * @var BookSearch $searchModel
 * @var string $btnClass
 * @var string $title
 * @var View $this
 *
 */
$this->title = $title;

//    echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            'tittle',
//            'author',
//            'pages',
//            'age',
//            [
//                'class' => 'yii\grid\ActionColumn'
//            ]
//        ]
//    ]);

$models = $dataProvider->models;
echo BookListWidget::widget([
        'models' => $models,
        'btnClass' => 'btn-danger',
]);



