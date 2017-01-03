<?php

class LeasingTermController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'leasingTerm_form', 'saveLeasingTerm'),
                'roles'=>array('SuperUser'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
                'roles'=>array('SuperUser'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new LeasingTerm;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['LeasingTerm']))
		{
			$model->attributes=$_POST['LeasingTerm'];

			if($model->save()) {
                $this->redirect(array('view','id'=>$model->guid));
            }
		}

        if(Yii::app()->request->getIsAjaxRequest())
            echo $this->renderPartial('_form',array('model'=>$model),true,true);//This will bring out the view along with its script.

        else $this->render('create',array(
            'model'=>$model,
        ));

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model);

        if (isset($_POST['LeasingTerm'])) {
            $model->attributes = $_POST['LeasingTerm'];

            if ($model->save()) {

                $this->redirect(array('view', 'id' => $model->guid));

            }
        }

        $this->render('update', array(
            'model' => $model,
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
		$dataProvider=new CActiveDataProvider('LeasingTerm');

		$dataProvider->setPagination(false);

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionLeasingterm_form() {

	    if(isset($_GET['guid']) && $_GET['guid'] > 0) {
	        $guid=$_GET['guid'];

	        $LeasingTerm=LeasingTerm::model()->findByPk($guid);

        } else {
	        $LeasingTerm = new LeasingTerm;
        }

        $this->renderPartial('_form', array('LeasingTerm'=>$LeasingTerm));

    }

    public function actionSaveLeasingTerm() {

	    if($_GET['guid']) {
	        $LeasingTerm=LeasingTerm::model()->findByPk($_GET['guid']);
        } else {
	        $LeasingTerm=new LeasingTerm;
        }

        $LeasingTerm->title=$_GET['title'];
	    $LeasingTerm->description=$_GET['description'];
	    $LeasingTerm->tag=$_GET['tag'];
	    $LeasingTerm->idUserAdd=Yii::app()->user->id;

	    $LeasingTerm->save();

        $msg='';
        foreach($LeasingTerm->getErrors() as $errors)
        {
            foreach($errors as $error)
            {
                if($error!='')
                    $msg.="$error - ";
            }
        }

        echo CJSON::encode(array("error"=>$msg,
            "guid"=>$LeasingTerm->guid,
            "title"=>$LeasingTerm->title,
            "description"=>$LeasingTerm->description,
            "tag"=>$LeasingTerm->tag,
            "idUserAdd"=>$LeasingTerm->idUserAdd,
            "button"=>"<ul id='icons' class='ui-widget ui-helper-clearfix'><li class='ui-state-default ui-corner-all' title='Redigera'><a href='#' id=".$LeasingTerm->guid."' class='new_leasingterm'><span class='ui-icon ui-icon-pencil'></span></a></li></ul>"
        ));

    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LeasingTerm('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeasingTerm']))
			$model->attributes=$_GET['LeasingTerm'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LeasingTerm the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LeasingTerm::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LeasingTerm $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='leasing-term-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
