<?php
/**
 * Created by PhpStorm.
 * User: Миша
 * Date: 23.01.2019
 * Time: 22:42
 */

class UserRule extends \yii\rbac\Rule
{

    /**
     * Executes the rule.
     *
     * @param string|int $user the user ID. This should be either an integer or a string representing
     * the unique identifier of a user. See [[\yii\web\User::id]].
     * @param \yii\rbac\Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to [[CheckAccessInterface::checkAccess()]].
     * @return bool a value indicating whether the rule permits the auth item it is associated with.
     */
    public function execute($user, $item, $params)
    {
        $name = 'isUser';

        // правило проверяет, что post был создан $user
        return isset($params['post']) ? $params['post']->createdBy == $user : false;
    }
}