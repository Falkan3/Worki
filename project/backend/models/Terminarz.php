<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terminarz".
 *
 * @property integer $id_terminarza
 * @property string $data
 * @property string $godzina
 * @property integer $home
 * @property integer $away
 * @property string $wynik
 *
 * @property Gol $gol
 * @property Karta[] $kartas
 * @property Klub $home0
 * @property Klub $away0
 */
class Terminarz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'terminarz';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data', 'godzina', 'home', 'away', 'wynik'], 'required'],
            [['data', 'godzina'], 'safe'],
            [['home', 'away'], 'integer'],
            [['wynik'], 'string'],
            [['away'], 'unique'],
            [['home'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_terminarza' => 'Id Terminarza',
            'data' => 'Data',
            'godzina' => 'Godzina',
            'home' => 'Home',
            'away' => 'Away',
            'wynik' => 'Wynik',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGol()
    {
        return $this->hasOne(Gol::className(), ['id_terminarza' => 'id_terminarza']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKartas()
    {
        return $this->hasMany(Karta::className(), ['id_terminarza' => 'id_terminarza']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHome0()
    {
        return $this->hasOne(Klub::className(), ['id_klubu' => 'home']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAway0()
    {
        return $this->hasOne(Klub::className(), ['id_klubu' => 'away']);
    }
}
