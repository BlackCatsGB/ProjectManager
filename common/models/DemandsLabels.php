<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "demands_labels".
 *
 * @property int $id
 * @property int $id_demand
 * @property int $id_label
 *
 * @property Demands $demand
 * @property Labels $label
 */
class DemandsLabels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'demands_labels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_demand', 'id_label'], 'integer'],
            [['id_demand'], 'exist', 'skipOnError' => true, 'targetClass' => Demands::className(), 'targetAttribute' => ['id_demand' => 'id']],
            [['id_label'], 'exist', 'skipOnError' => true, 'targetClass' => Labels::className(), 'targetAttribute' => ['id_label' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_demand' => 'Id Demand',
            'id_label' => 'Id Label',
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
    public function getLabel()
    {
        return $this->hasOne(Labels::className(), ['id' => 'id_label']);
    }
}
