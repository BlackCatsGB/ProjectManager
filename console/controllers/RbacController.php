<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "crudPost"
        $crudProject = $auth->createPermission('crudProject');
        $crudProject->description = 'Create, update, delete a project';
        $auth->add($crudProject);

        // добавляем разрешение "toNewProject"
        $toNewProject = $auth->createPermission('toNewProject');
        $toNewProject->description = 'Move to new project';
        $auth->add($toNewProject);

        // добавляем разрешение "toAnalyseProject"
        $toAnalyseProject = $auth->createPermission('toAnalyseProject');
        $toAnalyseProject->description = 'Move to analyse project';
        $auth->add($toAnalyseProject);

        // добавляем разрешение "analyseProject"
        $analyseProject = $auth->createPermission('analyseProject');
        $analyseProject->description = 'Analyse project';
        $auth->add($analyseProject);

        //---------------------------------------------------------------

        // добавляем роли "author" и даём роли разрешение "createPost"
        $admin = $auth->createRole('administrator');
        $auth->add($admin);
        $auth->addChild($admin, $crudProject);
        $auth->addChild($admin, $toNewProject);
        $auth->addChild($admin, $toAnalyseProject);
        $auth->addChild($admin, $analyseProject);

        $user = $auth->createRole('user');
        $auth->add($user);

        $manager = $auth->createRole('manager');
        $auth->add($manager);
        $auth->addChild($manager, $crudProject);

        $customer = $auth->createRole('customer');
        $auth->add($customer);
        $auth->addChild($customer, $toNewProject);

        $analyst = $auth->createRole('analyst');
        $auth->add($analyst);

        //$auth->removeChild($author, $createPost);

        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        //$admin = $auth->createRole('admin');
        //$auth->add($admin);
        //$auth->addChild($admin, $createProject);
        //$auth->addChild($admin, $author);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        //$auth->assign($author, 2);
        //$auth->assign($admin, 1);
    }

    public function actionClear()
    {

    }
}