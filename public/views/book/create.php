<?php

use app\models\Book;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var Book $model
 */
$form = ActiveForm::begin();
echo $form->field($model, 'tittle');
echo $form->field($model, 'author');
echo $form->field($model, 'pages');
echo $form->field($model, 'age');
echo $form->field($model, 'user_id')->dropDownList(User::getUserList());
echo Html::submitButton('Добавить', ['class' => 'btn btn-danger']);
ActiveForm::end();

#echo Html::a('nazad', Yii::$app->request->referrer);