<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;

abstract class BaseController extends Controller
{
    public $modelClass;
    public $searchModelClass;

    public function beforeAction($action)
    {
        $this->setBreadcrumbs();
        return parent::beforeAction($action);
    }

    public function setBreadcrumbs()
    {
        if($this->action->id == 'update'){
            $this->view->title = 'Редактировать';
        }elseif ($this->action->id == 'create'){
            $this->view->title = 'Добавление';
        }elseif ($this->action->id == 'view'){
            $this->view->title = 'Просмотр';
        }elseif ($this->action->id == 'index'){
            $this->view->title = 'Список';
        }
    }

    public function actionIndex(): string
    {
        $searchModel = new $this->searchModelClass();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'title' => 'Список'
        ]);
    }

    public function actionCreate()
    {
        $model = new $this->modelClass();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Url::to("/$this->id/index"));
        }
        return $this->render("create", ['model' => $model, 'title' => 'Создать']);
    }

    public function actionUpdate($id)
    {
        $model = $this->modelClass::findOne($id);
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(Url::to("/$this->id/index"));
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $book = $this->modelClass::findOne($id);
        $book->delete();
        return $this->redirect(Url::to("/$this->id/index"));
    }
}