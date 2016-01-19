<?php
namespace backend\models;

use yii\base\Model;

/**
 * List of stadions
 */
class Liga extends Model
{
    public $league;

    public static function getAllLeaguesIdAndNames() {
        $connection = \Yii::$app->db;
 	$command = $connection->createCommand('SELECT id_ligi, nazwa_ligi FROM Liga');
	$data = $command->queryAll();  
        //var_dump($data);
        return $data;
    }
   
}