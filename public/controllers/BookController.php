<?php

namespace app\controllers;

use app\models\Book;
use app\models\BookSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;


class BookController extends Controller
{
    public function actionIndex(): string
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
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