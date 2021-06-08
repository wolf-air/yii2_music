<?php


namespace app\controllers;

use yii\web\Controller;

class TaskController extends Controller
{
    public function actionTask()
    {
        return $this->render('task', ['text' => 'This is task.']);
    }
}