<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zawodnik".
 *
 * @property integer $id_zawodnika
 * @property string $imie
 * @property string $nazwisko
 * @property integer $id_klubu
 * @property string $pozycja
 * @property integer $wzrost
 * @property integer $nr_koszulki
 * @property string $zdjecie
 * @property string $kraj
 *
 * @property Gol $gol
 * @property Gol $gol0
 * @property Klub $idKlubu
 */
class Zawodnik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zawodnik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imie', 'nazwisko', 'id_klubu', 'pozycja', 'wzrost', 'nr_koszulki', 'kraj'], 'required'],
            [['imie', 'nazwisko', 'pozycja', 'zdjecie', 'kraj'], 'string'],
            [['id_klubu', 'wzrost', 'nr_koszulki'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_zawodnika' => 'Id Zawodnika',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'id_klubu' => 'Id Klubu',
            'pozycja' => 'Pozycja',
            'wzrost' => 'Wzrost',
            'nr_koszulki' => 'Nr Koszulki',
            'zdjecie' => 'Zdjecie',
            'kraj' => 'Kraj',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGol()
    {
        return $this->hasOne(Gol::className(), ['id_strzelca' => 'id_zawodnika']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGol0()
    {
        return $this->hasOne(Gol::className(), ['id_asystenta' => 'id_zawodnika']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKlubu()
    {
        return $this->hasOne(Klub::className(), ['id_klubu' => 'id_klubu']);
    }
}
