<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karta".
 *
 * @property integer $id_kartki
 * @property integer $id_terminarza
 * @property integer $id_zawodnika
 * @property string $kolor
 * @property string $minuta
 *
 * @property Terminarz $idTerminarza
 */
class Karta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_terminarza', 'id_zawodnika', 'kolor', 'minuta'], 'required'],
            [['id_terminarza', 'id_zawodnika'], 'integer'],
            [['kolor', 'minuta'], 'string'],
            [['id_terminarza', 'id_zawodnika'], 'unique', 'targetAttribute' => ['id_terminarza', 'id_zawodnika'], 'message' => 'The combination of Id Terminarza and Id Zawodnika has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kartki' => 'Id Kartki',
            'id_terminarza' => 'Id Terminarza',
            'id_zawodnika' => 'Id Zawodnika',
            'kolor' => 'Kolor',
            'minuta' => 'Minuta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTerminarza()
    {
        return $this->hasOne(Terminarz::className(), ['id_terminarza' => 'id_terminarza']);
    }
}
