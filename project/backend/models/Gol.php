<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gol".
 *
 * @property integer $id_golu
 * @property integer $id_terminarza
 * @property integer $id_strzelca
 * @property integer $id_asystenta
 * @property string $minuta
 *
 * @property Terminarz $idTerminarza
 * @property Zawodnik $idStrzelca
 * @property Zawodnik $idAsystenta
 */
class Gol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_terminarza', 'id_strzelca', 'id_asystenta', 'minuta'], 'required'],
            [['id_terminarza', 'id_strzelca', 'id_asystenta'], 'integer'],
            [['minuta'], 'string'],
            [['id_terminarza'], 'unique'],
            [['id_strzelca'], 'unique'],
            [['id_asystenta'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_golu' => 'Id Golu',
            'id_terminarza' => 'Id Terminarza',
            'id_strzelca' => 'Id Strzelca',
            'id_asystenta' => 'Id Asystenta',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStrzelca()
    {
        return $this->hasOne(Zawodnik::className(), ['id_zawodnika' => 'id_strzelca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsystenta()
    {
        return $this->hasOne(Zawodnik::className(), ['id_zawodnika' => 'id_asystenta']);
    }
}
