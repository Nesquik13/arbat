<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/**
 * @var ActiveDataProvider $dataProvider
 */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'surname',
//        'password',
        'phone',
        'email',
        'created_at:datetime',
        'updated_at:datetime',
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

