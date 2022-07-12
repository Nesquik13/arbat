<?php
/**
 * @var array $models
 * @var string $btnClass
 */

use app\models\Book;
use yii\helpers\Url;

$a = $models[0];
$b = 0;
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
                <p class="card-text"><?= !is_null($model->user) ? $model->user->name : 'Нет пользователя' ?></p>
                <a href="<?= Url::to(['/book/update', 'id' => $model->id]) ?>" class="btn <?= $btnClass ?>">Редактировать</a>
            </div>
        </div>
    </div>
   <?php }?>
</div>