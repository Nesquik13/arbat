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
 * @var bool $isAdmin
 * @var View $this
 */

$this->registerJs(<<<JS
$.get('/user/user-list', {q: 'Вик'}, function (data){
    alert(data);
})
JS, View::POS_READY);

$path = $isAdmin ? '_admin_form' : '_user_form';

echo $this->render($path, ['messages' => $messages, 'newMessage' => $newMessage]);
