<?php
use app\models\Message;
use app\models\User;
use yii\helpers\Html;
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
        <h3 class="card-title">Direct Chat</h3>
    </div>

    <div class="card-body">
        <div class="direct-chat-messages">

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
                <?= Html::activeInput('text', $newMessage, 'message', ['class' => 'form-control']) ?>
                <span class="input-group-append">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </span>
            </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
