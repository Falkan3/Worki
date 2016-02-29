<?php
namespace backend\models;

use yii\base\Model;

/**
 * List of stadions
 */
class StadionList extends Model
{
    public $league;

	public function attributeLabels()
    {
        return [
            'league' => 'Liga', 
        ];
    }
    
    public function stadiony() {
        var_dump($league);
    }
   
}
