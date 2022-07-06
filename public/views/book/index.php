<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/**
 * @var ActiveDataProvider $dataProvider
 */
    echo GridView::widget([
        'dataProvider' => $dataProvider,
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
