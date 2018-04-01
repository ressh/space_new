<?php

/**
 * This is the model class for table "Pays".
 *
 * The followings are the available columns in table 'Pays':
 * @property integer $id
 * @property integer $id_player
 * @property integer $summ
 * @property integer $status
 * @property string $time
 */
class Pays extends CActiveRecord
{
    public $type_pay;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Pays';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.

        $obj=new CHtmlPurifier();
        $obj->options = array('HTML.Allowed'=>'');
        $obj = array( $obj ,'purify');

        return array(
			array('id_player, summ', 'required'),
			array('id_player', 'numerical', 'integerOnly'=>true),
            array('summ, status', 'length', 'max'=>10),
            array('summ, status', 'filter', 'filter'=>$obj),

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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_player' => 'Id Player',
			'summ' => 'Summ',
			'time' => 'Time',
		);
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pays the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
