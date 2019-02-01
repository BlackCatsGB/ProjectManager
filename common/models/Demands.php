<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "demands".
 *
 * @property int $id
 * @property int $uid
 * @property string $text
 * @property int $id_version
 * @property int $id_parent
 *
 * @property DemandsLabels[] $demandsLabels
 * @property DemandsSource[] $demandsSources
 * @property ProjectsDemands[] $projectsDemands
 */
class Demands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'demands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'text'], 'required'],
            [['uid', 'id_version', 'id_parent'], 'integer'],
            [['text'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'text' => 'Text',
            'id_version' => 'Id Version',
            'id_parent' => 'Id Parent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDemandsLabels()
    {
        return $this->hasMany(DemandsLabels::className(), ['id_demand' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDemandsSources()
    {
        return $this->hasMany(DemandsSource::className(), ['id_demand' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectsDemands()
    {
        return $this->hasMany(ProjectsDemands::className(), ['fk_demand' => 'id']);
    }
}
