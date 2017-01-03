<?php

/**
 * Created by PhpStorm.
 * User: charlotte
 * Date: 2016-12-07
 * Time: 10:13
 */
class myInitController extends Controller
{

    public function actionRun() {

        $auth=Yii::app()->authManager;

        $auth->createOperation('createUsers', 'create a user');

        $bizRule='return Yii::app()->user->guid==$params["post"]->authID;';
        $task=$auth->createTask('updateOwnPasswords', 'update a password author himself', $bizRule);

        $role=$auth->createRole('superadmin');
        $role->addChild('createUsers');

        $auth->assign('superadmin', '1');

        echo "done";
    }

    public function actionCheckAccess() {
        if(Yii::app()->user->checkAccess('login')) {
            echo "Authorized";
        } else {
            echo "not authorized";
        }

    }

}