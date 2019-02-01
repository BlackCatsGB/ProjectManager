<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects_demands".
 *
 * @property int $fk_project Проект
 * @property int $fk_demand Требование
 * @property int $is_relevant Актуальность
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 * @property string $comment Комментарий
 *
 * @property Demands $fkDemand
 * @property ProjectModel $fkProject
 * @property User $createdBy
 * @property User $updatedBy
 */
class ProjectsDemands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects_demands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_project', 'fk_demand', 'created_by', 'created_at'], 'required'],
            [['fk_project', 'fk_demand', 'is_relevant', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['fk_project', 'fk_demand'], 'unique', 'targetAttribute' => ['fk_project', 'fk_demand']],
            [['fk_demand'], 'exist', 'skipOnError' => true, 'targetClass' => Demands::className(), 'targetAttribute' => ['fk_demand' => 'id']],
            [['fk_project'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectModel::className(), 'targetAttribute' => ['fk_project' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fk_project' => 'Fk Project',
            'fk_demand' => 'Fk Demand',
            'is_relevant' => 'Is Relevant',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkDemand()
    {
        return $this->hasOne(Demands::className(), ['id' => 'fk_demand']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'fk_project']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

}
