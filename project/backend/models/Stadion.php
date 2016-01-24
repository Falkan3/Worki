<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stadion".
 *
 * @property integer $id_stadionu
 * @property string $nazwa
 * @property string $pojemnosc
 * @property string $rok_wybudowania
 * @property string $zdjecie
 *
 * @property Klub[] $klubs
 */
class Stadion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stadion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa', 'pojemnosc', 'rok_wybudowania'], 'required'],
            [['nazwa', 'pojemnosc', 'zdjecie'], 'string'],
            [['rok_wybudowania'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_stadionu' => 'Id Stadionu',
            'nazwa' => 'Nazwa',
            'pojemnosc' => 'Pojemnosc',
            'rok_wybudowania' => 'Rok Wybudowania',
            'zdjecie' => 'Zdjecie',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlubs()
    {
        return $this->hasMany(Klub::className(), ['id_stadionu' => 'id_stadionu']);
    }
}
