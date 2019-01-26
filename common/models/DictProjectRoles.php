<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dict_project_roles".
 *
 * @property int $id
 * @property string $name Name
 *
 * @property ProjectUser[] $projectUsers
 */
class DictProjectRoles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dict_project_roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectUsers()
    {
        return $this->hasMany(ProjectUser::className(), ['fk_project_role' => 'id']);
    }
}
