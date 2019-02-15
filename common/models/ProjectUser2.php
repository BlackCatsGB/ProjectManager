<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_user".
 *
 * @property int $project_id
 * @property int $user_id
 * @property int $role
 * @property int $fk_project_role
 *
 * @property ProjectModel $project
 * @property DictProjectRoles $fkProjectRole
 * @property User $user
 */
class ProjectUser2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_user';
    }

    public static function primaryKey()
    {
        return ['project_id', 'user_id'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id'], 'required'],
            [['project_id', 'user_id', 'role', 'fk_project_role'], 'integer'],
            [['project_id', 'user_id'], 'unique', 'targetAttribute' => ['project_id', 'user_id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectModel::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['fk_project_role'], 'exist', 'skipOnError' => true, 'targetClass' => DictProjectRoles::className(), 'targetAttribute' => ['fk_project_role' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'user_id' => 'User ID',
            'role' => 'Role',
            'fk_project_role' => 'Fk Project Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(ProjectModel::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkProjectRole()
    {
        return $this->hasOne(DictProjectRoles::className(), ['id' => 'fk_project_role']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Выводит список пльзователей и применяется для редактирования связи юзеров и проектов
     * @return array
     */
    public function getUsers()
    {
        return User::find()->select('username')->indexBy('id')->column();
    }

    /**
     * Выводит список пльзователей и применяется для редактирования связи юзеров и проектов
     * @return array
     */
    public function getProjects()
    {
        return ProjectModel::find()->select('title')->indexBy('id')->column();
    }
}
