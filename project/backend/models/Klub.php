<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "klub".
 *
 * @property integer $id_klubu
 * @property string $nazwa_klubu
 * @property integer $id_ligi
 * @property integer $id_stadionu
 * @property string $logo
 * @property string $trener
 *
 * @property Liga $idLigi
 * @property Stadion $idStadionu
 * @property Terminarz $terminarz
 * @property Terminarz $terminarz0
 * @property Zawodnik[] $zawodniks
 */
class Klub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'klub';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa_klubu', 'id_ligi'], 'required'],
            [['nazwa_klubu', 'logo', 'trener'], 'string'],
            [['id_ligi', 'id_stadionu'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_klubu' => 'Id Klubu',
            'nazwa_klubu' => 'Nazwa Klubu',
            'id_ligi' => 'Id Ligi',
            'id_stadionu' => 'Id Stadionu',
            'logo' => 'Logo',
            'trener' => 'Trener',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLigi()
    {
        return $this->hasOne(Liga::className(), ['id_ligi' => 'id_ligi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStadionu()
    {
        return $this->hasOne(Stadion::className(), ['id_stadionu' => 'id_stadionu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerminarz()
    {
        return $this->hasOne(Terminarz::className(), ['home' => 'id_klubu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerminarz0()
    {
        return $this->hasOne(Terminarz::className(), ['away' => 'id_klubu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZawodniks()
    {
        return $this->hasMany(Zawodnik::className(), ['id_klubu' => 'id_klubu']);
    }
}
