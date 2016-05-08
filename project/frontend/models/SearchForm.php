<?php
namespace frontend\models;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SearchForm extends Model
{
    public $id;
    public $site;
	public $primarystring;
	public $secondarystring;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id', 'filter', 'filter' => 'trim'],
            ['id', 'required'],
            ['id', 'int', 'min' => 1],

            ['primarystring', 'filter', 'filter' => 'trim'],
            ['primarystring', 'string', 'max' => 255],
			
			['secondarystring', 'filter', 'filter' => 'trim'],
            ['secondarystring', 'string', 'max' => 255],
        ];
    }

	public function attributeLabels()
    {
        return [
            'id' => 'Identyfikator', 
			'primarystring' => 'Imię lub nazwa',
			'secondarystring' => 'Nazwisko',
        ];
    }
}
