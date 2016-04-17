<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liga".
 *
 * @property integer $id_ligi
 * @property string $nazwa_ligi
 * @property string $kraj
 * @property string $logo
 *
 * @property Klub[] $klubs
 */
class Liga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'liga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nazwa_ligi', 'kraj'], 'required'],
            [['nazwa_ligi', 'kraj'], 'string'],
            [['logo'], 'file', 'extensions' => 'png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ligi' => 'Id Ligi',
            'nazwa_ligi' => 'Nazwa Ligi',
            'kraj' => 'Kraj',
            'logo' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlubs()
    {
        return $this->hasMany(Klub::className(), ['id_ligi' => 'id_ligi']);
    }
}
