<?php


namespace app\controllers;

use app\models\SearchProduct;
use Yii;

class ApiController extends BaseController
{
    public function actionIndex()
    {
        $get = Yii::$app->request->get();
        return (new SearchProduct())->search($get);
    }
}