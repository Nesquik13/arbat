<?php
use app\models\Message;
use app\models\User;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\ActiveForm;


/**
 * @var array $messages
 * @var Message $message
 * @var Message $newMessage
 * @var View $this
 */

?>



<div class="card direct-chat direct-chat-primary">
    <div class="card-header">
        <h3 class="card-title">Чат</h3>
    </div>

    <div class="card-body" >
        <div class="direct-chat-messages" style="height: 100%;">

            <?php foreach ($messages as $message) {
                $isAdmin = $message->userTo->id == User::ADMIN_ID;
                ?>
                <div class="direct-chat-msg <?= $isAdmin ? '' : 'right' ?>">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name <?= $isAdmin ? 'float-left' : 'float-right' ?>"><?= $message->userTo->name ?></span>
                        <span class="direct-chat-timestamp <?= $isAdmin ? 'float-right' : 'float-left' ?>">
                            <?= date('H:i:s d-M-y', strtotime('+3 hour', $message->created_at)) ?>
                        </span>
                    </div>

                    <img class="direct-chat-img" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="message user image">

                    <div class="direct-chat-text">
                        <?= $message->message ?>
                    </div>
                </div>
            <?php } ?>

        </div>

        <div class="card-footer">
            <?php $form = ActiveForm::begin() ?>
            <div class="input-group">
                <span class="input-group-prepend">
                <?= Select2::widget([
                    'model' => $newMessage,
                    'attribute' => 'user_id_from',
                    'options' => ['placeholder' => 'Введите имя пользователя'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 1,
                        'ajax' => [
                            'url' => Url::to('/user/user-list'),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                        ],
                    ],
                ]) ?>
                </span>
                <?= Html::activeInput('text', $newMessage, 'message', ['class' => 'form-control']) ?>
                <span class="input-group-append">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </span>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>

