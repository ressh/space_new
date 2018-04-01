<?php

/**
 * This is the model class for table "Statistic".
 *
 * The followings are the available columns in table 'Statistic':
 * @property integer $id
 * @property integer $invest_summ
 * @property integer $out_sum
 * @property integer $questions_summ_complette
 * @property integer $referals
 * @property integer $id_ref_bonuse
 *
 * The followings are the available model relations:
 * @property Player $player
 */
class Statistic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Statistic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_player, invest_summ, out_sum, questions_summ_complette, referals', 'required'),
			array('invest_summ, out_sum, questions_summ_complette, referals', 'numerical', 'integerOnly'=>true),

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
			'player' => array(self::HAS_ONE, 'Player', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'invest_summ' => 'Invest Summ',
			'out_sum' => 'Out Sum',
			'questions_summ_complette' => 'Questions Summ Complette',
		);
	}

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

		$criteria->compare('id',$this->id);
		$criteria->compare('invest_summ',$this->invest_summ);
		$criteria->compare('out_sum',$this->out_sum);
		$criteria->compare('questions_summ_complette',$this->questions_summ_complette);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getCurrentReferalsPersentSummBuy()
    {
        // Сравнить число пригласивших, чтобы определить сумму вознагражения
        foreach( Yii::app()->params['referals']['counts'] as $key => $count ) {
            // Если количество рефералов попадает в диапазон (в массиве в настройках игры)
            if ($this->referals >= $count && $this->referals < Yii::app()->params['referals']['counts'][$key + 1]) {

                return Yii::app()->params['referals']['summ'][$key];
                break;
            }
        }
    }

    public function getCurrentReferalsPersentLimitBuy()
    {
        // Сравнить число пригласивших, чтобы определить сумму вознагражения
        foreach( Yii::app()->params['referals']['counts'] as $key => $count ) {
            // Если количество рефералов попадает в диапазон (в массиве в настройках игры)
            if ($this->referals >= $count && $this->referals < Yii::app()->params['referals']['counts'][$key + 1]) {

                return Yii::app()->params['referals']['summ_limit'][$key];
                break;
            }
        }
    }

    public function getCurrentReferalsCountNext()
    {
        // Сравнить число пригласивших, чтобы определить сумму вознагражения
        foreach( Yii::app()->params['referals']['counts'] as $key => $count ) {
            // Если количество рефералов попадает в диапазон (в массиве в настройках игры)
            if ($this->referals >= $count && $this->referals < Yii::app()->params['referals']['counts'][$key + 1]) {

                return Yii::app()->params['referals']['counts'][$key+1];
                break;
            }
        }
    }

    public function getCurrentReferalsPersentSummBuyNext()
    {
        // Сравнить число пригласивших, чтобы определить сумму вознагражения
        foreach( Yii::app()->params['referals']['counts'] as $key => $count ) {
            // Если количество рефералов попадает в диапазон (в массиве в настройках игры)
            if ($this->referals >= $count && $this->referals < Yii::app()->params['referals']['counts'][$key + 1]) {

                return Yii::app()->params['referals']['summ'][$key+1];
                break;
            }
        }
    }

    public function getCurrentReferalsPersentLimitBuyNext()
    {
        // Сравнить число пригласивших, чтобы определить сумму вознагражения
        foreach( Yii::app()->params['referals']['counts'] as $key => $count ) {
            // Если количество рефералов попадает в диапазон (в массиве в настройках игры)
            if ($this->referals >= $count && $this->referals < Yii::app()->params['referals']['counts'][$key + 1]) {

                return Yii::app()->params['referals']['summ_limit'][$key+1];
                break;
            }
        }
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Statistic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
