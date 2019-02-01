<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "demands_source".
 *
 * @property int $id
 * @property int $id_doc
 * @property int $id_demand
 *
 * @property Demands $demand
 * @property DemandsDocument $doc
 */
class DemandsSource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'demands_source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_doc', 'id_demand'], 'integer'],
            [['id_demand'], 'exist', 'skipOnError' => true, 'targetClass' => Demands::className(), 'targetAttribute' => ['id_demand' => 'id']],
            [['id_doc'], 'exist', 'skipOnError' => true, 'targetClass' => DemandsDocument::className(), 'targetAttribute' => ['id_doc' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_doc' => 'Id Doc',
            'id_demand' => 'Id Demand',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDemand()
    {
        return $this->hasOne(Demands::className(), ['id' => 'id_demand']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoc()
    {
        return $this->hasOne(DemandsDocument::className(), ['id' => 'id_doc']);
    }
}
