<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;
use yii\web\BadRequestHttpException;
use Yii;
use app\models\Game;

class GameController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => \yii\filters\ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    // GET orqali default javob
    public function actionIndex()
    {
        $game = new Game("FIFA", "Sports", 100);

        return [
            'name' => $game->getName(),
            'type' => $game->getType(),
            'score' => $game->getScore()
        ];
    }

    // POST orqali JSON ma'lumot qabul qilish
    public function actionUpdate()
    {
        $request = Yii::$app->request;

        $data = $request->getRawBody();
        $json = json_decode($data, true);

        if (!$json) {
            throw new BadRequestHttpException("JSON ma'lumot yuboring!");
        }

        $name = $json['name'] ?? "No Name";
        $type = $json['type'] ?? "No Type";
        $score = $json['score'] ?? 0;

        $game = new Game($name, $type, $score);

        return [
            'name' => $game->getName(),
            'type' => $game->getType(),
            'score' => $game->getScore()
        ];
    }
}
