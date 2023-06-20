<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class AppAdminController extends Controller
{
    public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'], // Require authenticated users
                    'matchCallback' => function ($rule, $action) {
                        return Yii::$app->user->identity->username === 'Shireee';
                    },
                ],
            ],
        ],
    ];
}
    // Other actions for the admin module
}