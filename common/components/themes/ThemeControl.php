<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 04/12/2019
 * Time: 16:15
 */

namespace common\components;
use yii\base\ActionFilter;
use Yii;

class ThemeControl extends ActionFilter
{
    public function init()
    {
        $switch=intval(Yii::$app->request->get('switch'));
        $theme = $switch ? 'spring' : 'christmas';
        Yii::$app->view->theme=Yii::createObject([
            'class' => 'yii\base\Theme',
            'pathMap' => [
                '@app/views' => [
                    "@app/themes/{$theme}",
                ]
            ],
        ]);
    }
}