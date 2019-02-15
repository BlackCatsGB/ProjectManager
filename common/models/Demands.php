<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "demands".
 *
 * @property int $id
 * @property int $uid
 * @property string $text
 * @property int $id_version
 * @property int $id_parent
 * @property int $is_group
 *
 * @property DemandsLabels[] $demandsLabels
 * @property DemandsSource[] $demandsSources
 * @property ProjectsDemands[] $projectsDemands
 * @property Demands $parent
 */
class Demands extends \yii\db\ActiveRecord
{
    const NOT_GROUP = 0;
    const IS_GROUP = 1;
    const GROUP_STATUSES = [
        self::NOT_GROUP => 'no',
        self::IS_GROUP => 'yes',
    ];

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
            [['is_group'], 'boolean'],
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
            'is_group' => 'Is group',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Demands::className(), ['id' => 'id_parent']);
    }

    public static function getGroups()
    {
        return ArrayHelper::map(self::find()->where(['is_group'=>true])->orderBy('id')->all(), 'id', 'text');
    }
}
