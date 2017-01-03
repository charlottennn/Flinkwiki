<?php

/**
 * This is the model class for table "leasingTerm".
 *
 * The followings are the available columns in table 'leasingTerm':
 * @property integer $guid
 * @property string $title
 * @property string $description
 * @property integer $idUserAdd
 * @property string $tag
 *
 * The followings are the available model relations:
 * @property JoinSectionTerm[] $joinSectionTerms
 * @property User $idUserAdd0
 */
class LeasingTerm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'leasingTerm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUserAdd', 'numerical', 'integerOnly'=>true),
			array('title, tag', 'length', 'max'=>50),
			array('description', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('guid, title, description, idUserAdd, tag', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'term_id' => array(self::HAS_MANY, 'JoinSectionTerm', 'term_id'),
			'idUserAdd' => array(self::BELONGS_TO, 'User', 'idUserAdd'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'guid' => 'Guid',
			'title' => 'Title',
			'description' => 'Description',
			'idUserAdd' => 'Id User Add',
            'tag' => 'Tag',
		);
	}

//    protected function beforeSave() {
//	    d2l(Yii::app()->user->id,"user id");
//	    d2l($this->isNewRecord, 'isNew');
//	    if(parent::beforeSave()) {
//	        if($this->isNewRecord) {
//	            $this->idUserAdd=Yii::app()->user->id;
//            }
//            return true;
//        } else
//            return false;
//    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('guid',$this->guid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('idUserAdd',$this->idUserAdd);
		$criteria->compare('tag', $this->tag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LeasingTerm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
