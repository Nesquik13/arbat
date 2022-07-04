<?php

namespace app\controllers;

use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new User();
        if($post = \Yii::$app->request->post() ){
            if($model->load($post) && $model->save()){
                return $this->redirect('/user/index');
            }
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdated()
    {
        return $this->render('updated');
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionDelete()
    {
        return $this->redirect('/index');
    }
}