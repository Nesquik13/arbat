<?php

use app\models\Book;
use app\models\BookSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;


/**
 * @var ActiveDataProvider $dataProvider
 * @var BookSearch $searchModel
 */
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
?>

<div class="row">
<?php foreach ($models as $model) {?>
    <div class="col-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $model->tittle ?></h5>
                <p class="card-text"><?= /*$model->info*/'Информация о книге'?></p>
                <a href="<?= Url::to(['/book/update', 'id' => $model->id]) ?>" class="btn btn-primary">Редактировать</a>
            </div>
        </div>
    </div>
   <?php }?>
</div>
