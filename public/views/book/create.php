<?php

use app\models\Book;
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
echo Html::submitButton('Добавить');
ActiveForm::end();

echo Html::a('nazad', Yii::$app->request->referrer);