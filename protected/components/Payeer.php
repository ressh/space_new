<?php

class Payeer extends CApplicationComponent
{
    public $sMerchantLogin;
    public $sMerchantPass1;
    public $sMerchantPass2;
    public $sCulture = 'ru';

    public $resultMethod = 'post';
    public $sIncCurrLabel = 'QiwiR';
    public $orderModel;
    public $priceField;
    public $isTest = true;

    public $params;

    protected $_order;

    public function pay($nOutSum, $nInvId)
    {
        $sign = $this->getPaySign($nOutSum, $nInvId);

        $url = $this->isTest
            ? 'https://payeer.com/merchant/?'
            : 'https://payeer.com/merchant/?';

        $url .= "m_shop={$this->sMerchantLogin}&";
        $url .= "m_orderid={$nInvId}&";
        $url .= "m_amount=" . number_format($nOutSum, 2, '.', '') . "&";
        $url .= "m_curr=RUB&";
        $url .= "m_desc=". base64_encode('Оплата игрвой валюты на сайте SpaceWarsGame') ."&";
        $url .= "m_sign={$sign}&";
        $url .= "lang=ru";

        Yii::app()->controller->redirect($url);

    }

    private function getPaySign($nOutSum, $nInvId)
    {
        $arHash = array(
            $this->sMerchantLogin,
            strval($nInvId),
            number_format($nOutSum, 2, '.', ''),
            'RUB',
            base64_encode('Оплата игрвой валюты на сайте SpaceWarsGame'),
            'putin_putin_777'
        );

        return strtoupper(hash('sha256', implode(":", $arHash)));
    }


    public function result()
    {

        $event = new CEvent($this);

        if ($_SERVER['REMOTE_ADDR'] != '37.59.221.230') return;

        if (isset($_POST['m_operation_id']) && isset($_POST['m_sign'])) {
            $m_key = 'putin_putin_777';
            $arHash = array($_POST['m_operation_id'],
                $_POST['m_operation_ps'],
                $_POST['m_operation_date'],
                $_POST['m_operation_pay_date'],
                $_POST['m_shop'],
                $_POST['m_orderid'],
                $_POST['m_amount'],
                $_POST['m_curr'],
                $_POST['m_desc'],
                $_POST['m_status'],
                $m_key);
            $sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));
            if ($_POST['m_sign'] == $sign_hash && $_POST['m_status'] == 'success') {

                $this->_order = CActiveRecord::model($this->orderModel)->findByPk((int)$_POST['m_orderid']);

                $this->params = array('order' => $this->_order);
                $this->onSuccess($event);

            }
        }
    }

    public function onSuccess($event)
    {
        $this->raiseEvent('onSuccess', $event);
    }

    public function onFail($event)
    {
        $this->raiseEvent('onFail', $event);
    }
}
