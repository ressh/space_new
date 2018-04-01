<?php

class MenuPlayer extends CWidget
{
    public function run()
    {
        if (Yii::app()->user->isGuest) {
            $this->render('_menuGuest');
        }
        else {

            $player = Player::model()->findByAttributes( array( 'email' => Yii::app()->user->id ) );
            $this->render('_menuPlayer', array( 'player'=>$player ));
        }
    }
}