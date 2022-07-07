<?php

use app\models\BookSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/**
 * @var ActiveDataProvider $dataProvider
 * @var BookSearch $searchModel
 */
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'tittle',
            'author',
            'pages',
            'age',
            [
                'class' => 'yii\grid\ActionColumn'
            ]
        ]
    ]);
