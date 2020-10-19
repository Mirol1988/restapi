<?php


namespace app\controllers;


use yii\rest\Controller;
use Infrastructure\auth\QueryParamAuthToken;
use yii\web\Response;

class BaseController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuthToken::class,
            'tokenParam' => 'app_token'
        ];
        // Удалить огранечение запросов к api
        unset($behaviors['rateLimiter']);
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;

        return $behaviors;
    }
}