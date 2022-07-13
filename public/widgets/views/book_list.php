<?php
/**
 * @var array $models
 * @var string $btnClass
 */

use app\models\Book;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
<?php
/** @var Book $model */
foreach ($models as $model) {?>
    <div class="col-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $model->tittle ?></h5>
                <p class="card-text"><?= /*$model->info*/'Информация о книге'?></p>
                <p class="card-text"><?= !is_null($model->user) ? Html::a($model->user->name, Url::to(['/user/view', 'id' => $model->user->id]) ) : 'Нет пользователя' ?></p>
                <a href="<?= Url::to(['/book/update', 'id' => $model->id]) ?>" class="btn btn-info">Редактировать</a>
                <a href="<?= Url::to(['/book/delete', 'id' => $model->id]) ?>" class="btn <?= $btnClass ?>">Удалить</a>
            </div>
        </div>
    </div>
   <?php }?>
</div>