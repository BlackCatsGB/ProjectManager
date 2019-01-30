<?php

namespace common\models;

use common\models\ProjectModel;
use common\models\query\ProjectUserQuery;
use Yii;

/**
 * This is the model class for table "project_user".
 *
 * @property int $project_id
 * @property int $user_id
 * @property string $role
 * @property int $fk_project_role
 *
 * @property ProjectModel $project
 * @property User $user
 */
class ProjectUserModel extends \yii\db\ActiveRecord
{
    const ROLE_MANAGER = 'manager';
    const ROLE_DEVELOPER = 'developer';
    const ROLE_TESTER = 'tester';
    const ROLES = [
        self::ROLE_MANAGER => 'manager',
        self::ROLE_DEVELOPER => 'developer',
        self::ROLE_TESTER => 'tester',
    ];

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
            [['project_id', 'user_id','fk_project_role'], 'integer'],
            [['role'], 'string'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectModel::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['fk_project_role'], 'exist', 'skipOnError' => true, 'targetClass' => DictProjectRoles::className(), 'targetAttribute' => ['fk_project_role' => 'id']],
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
            'fk_project_role' => 'Role in project',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkProjectRole()
    {
        return $this->hasOne(DictProjectRoles::className(), ['id' => 'fk_project_role']);
    }

    /**
     * {@inheritdoc}
     * @return ProjectUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectUserQuery(get_called_class());
    }

}
