<?php

namespace app\packages\dashboard;
use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\packages\dashboard\controllers';
	
    public function init()
    {
        parent::init();

		// custom initialization code goes here
		\Yii::$app->formatter->nullDisplay = '';
    }
}