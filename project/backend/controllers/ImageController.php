<?php

namespace backend\controllers;

class ImageController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $mediaFolder = dirname(__FILE__).'/../../media/images/';
        $fileName = $mediaFolder.$id;
	header('Content-type: image/png');
	header('Content-Length: ' . filesize($fileName));
	readfile($fileName);
    }
}
