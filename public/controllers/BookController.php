<?php

namespace app\controllers;

use app\models\Book;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;


class BookController extends Controller
{
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find()
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new Book();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/book/index');
        }
        return $this->render('/book/create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Book::findOne($id);
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect('/book/index');
        }
        return $this->render('create', ['model' => $model]);
    }
    public function actionDelete($id){
        $book = Book::findOne($id);
        $book->delete();
        return $this->redirect('/book/index');
    }
}