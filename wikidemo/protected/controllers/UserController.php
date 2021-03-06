<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view','create','update','admin','delete', 'createUser', 'user_form'),
                'roles'=>array('SuperUser', 'admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

    public function actionUser_form() {

        if(isset($_GET['guid']) && $_GET['guid'] > 0) {
            $guid=$_GET['guid'];

            $User=User::model()->findByPk($guid);

        } else {
            $User = new User;
        }

        $this->renderPartial('_form', array('User'=>$User));

    }

    public function actionCreateUser() {

        if(Yii::app()->user->checkAccess('createUsers')) {

            if($_GET['guid']) {
                $User=User::model()->findByPk($_GET['guid']);
            } else {
                $User=new User;
            }

            $User->first_name = $_GET['first_name'];
            $User->last_name = $_GET['last_name'];
            $User->email = $_GET['email'];
            $User->password = $_GET['password'];
            $User->code_role = $_GET['code_role'];


            $User->password = crypt($User->password, 'salt');

            if($User->save()) {

                $auth=new AuthAssignment;
                $auth->userid = $User->guid;
                $auth->itemname = CodeRole::model()->findByPk($User->code_role)->title;
            }

            $msg='';
            foreach($User->getErrors() as $errors)
            {
                foreach($errors as $error)
                {
                    if($error!='')
                        $msg.="$error - ";
                }
            }

            echo CJSON::encode(array("error"=>$msg,
                "guid"=>$User->guid,
                "first_name"=>$User->first_name,
                "last_name"=>$User->last_name,
                "email"=>$User->email,
                "password"=>$User->password,
                "code_role"=>$User->code_role,
                "button"=>"<ul id='icons' class='ui-widget ui-helper-clearfix'><li class='ui-state-default ui-corner-all' title='Redigera'><a href='#' id=".$User->guid."' class='new_user'><span class='ui-icon ui-icon-pencil'></span></a></li></ul>"

            ));
        }


        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

	    if(Yii::app()->user->checkAccess('createUsers')) {

            $user=new User;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['User']))
            {
                $user->attributes=$_POST['User'];
                $user->password = crypt($user->password, 'salt');
                if($user->save()) {

//                    $auth=Yii::app()->authManager;
//                    $auth->assign(CodeRole::model()->findByPk($user->code_role)->title
//                        , $user->guid);
                    $auth=new AuthAssignment;
                    $auth->userid = $user->guid;
                    $auth->itemname = CodeRole::model()->findByPk($user->code_role)->title;
                     $auth->save();
                    $this->redirect(array('view','id'=>$user->guid));

                }

            }

            $this->render('create',array(
                'model'=>$user,
            ));

        } else {
	        $url=$this->createUrl('//site/login');
        }

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->guid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');

        $dataProvider->setPagination(false);

        $this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
