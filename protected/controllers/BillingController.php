<?php

class BillingController extends Controller
{

    /*
        Всё начинается здесь. Заводим в базе запись с новым выставленным счетом,
        и передаем компоненту его ID, сумму, краткое описание и опционально e-mail пользователя.
        Можно не выносить эти данные в отдельную модель, а использовать атрибуты оформленного
        пользователем заказа (для интернет-магазинов).
    */
    public function actionIndex()
    {
        Yii::app()->request->enableCsrfValidation = false;

        if (isset($_POST['Pays'])) {
            $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

            $payForm = new Pays();
            $payForm->attributes = $_POST['Pays'];
            $payForm->id_player = $player->id;


                if ($payForm->save()) {

                    Yii::app()->payeer->pay(
                        $payForm->summ,
                        $payForm->id,
                        "Покупка игровой валюты",
                        $player->email
                    );
            } else {
                print_R( $payForm->getErrors() );
                }

            }


    }

    public function actionResultYandex()
    {

        $secret = 'kP7MWwNPkeuCh6uW5VGe40Zz'; // секрет, который мы получили в первом шаге от яндекс.
        // получение данных.
        $r = array(
            'notification_type' => $_POST['notification_type'], // p2p-incoming / card-incoming - с кошелька / с карты
            'operation_id' => $_POST['operation_id'],      // Идентификатор операции в истории счета получателя.
            'amount' => $_POST['amount'],            // Сумма, которая зачислена на счет получателя.
            'withdraw_amount' => $_POST['withdraw_amount'],   // Сумма, которая списана со счета отправителя.
            'currency' => 643,            // Код валюты — всегда 643 (рубль РФ согласно ISO 4217).
            'datetime' => $_POST['datetime'],          // Дата и время совершения перевода.
            'sender' => $_POST['sender'],            // Для переводов из кошелька — номер счета отправителя. Для переводов с произвольной карты — параметр содержит пустую строку.
            'codepro' => $_POST['codepro'],           // Для переводов из кошелька — перевод защищен кодом протекции. Для переводов с произвольной карты — всегда false.
            'label' => $_POST['label'],             // Метка платежа. Если ее нет, параметр содержит пустую строку.
            'sha1_hash' => $_POST['sha1_hash']          // SHA-1 hash параметров уведомления.
        );

        Yii::log( "Хеш сервера " . $_POST['sha1_hash'] );
        Yii::log( "Хеш генерир " . sha1($r['notification_type'] . '&' .
            $r['operation_id'] . '&' .
            $r['amount'] . '&' .
            $r['currency'] . '&' .
            $r['datetime'] . '&' .
            $r['sender'] . '&' .
            $r['codepro'] . '&' .
            $secret . '&' .
            $r['label']) );

        
        // проверка хеш
        if (sha1($r['notification_type'] . '&' .
                $r['operation_id'] . '&' .
                $r['amount'] . '&' .
                $r['currency'] . '&' .
                $r['datetime'] . '&' .
                $r['sender'] . '&' .
                $r['codepro'] . '&' .
                $secret . '&' .
                $r['label']) != $r['sha1_hash']
        ) {
            exit('Верификация не пройдена. SHA1_HASH не совпадает.'); // останавливаем скрипт. у вас тут может быть свой код.
        }

        // обработаем данные. нас интересует основной параметр label и withdraw_amount для получения денег без комиссии для пользователя.
        // либо если вы хотите обременить пользователя комиссией - amount, но при этом надо учесть, что яндекс на странице платежа будет писать "без комиссии".
        $r['amount'] = floatval($r['amount']);
        $r['withdraw_amount'] = floatval($r['withdraw_amount']);
        $r['label'] = intval($r['label']); // здесь я у себя передаю id юзера, который пополняет счет на моем сайте. поэтому обрабатываю его intval

        // Запишем в модель оплаты что оплата прошла
        $payForm = new Pays();
        $payForm->summ = $r['withdraw_amount'];
        $payForm->id_player = $r['label'];
        $payForm->status = 'succes';
        $payForm->save(false);

        $player = Player::model()->findByPk( $payForm->id_player );

        // Прибавим в статистике пользователя параметр инвестиции
        $statistic = Statistic::model()->findByAttributes(array('id_player' => $player->id));
        $statistic->invest_summ += $payForm->summ;
        $statistic->save();

        // Добавим пользователю сумму на счет оплаты !!!*1000!!!
        $player->setSummBuyPlus($payForm->summ);

        $player->setOperation( Operations::$OP_BILLING, Operations::$TYPE_BUY, $payForm->summ );

        // Увеличим лемит вывода
        $current_summ_limit = $payForm->summ * 0.4;
        $player->setSummLimitPlus($current_summ_limit);

        $player->setOperation( Operations::$OP_BILLING, Operations::$TYPE_LIMIT, $current_summ_limit );

        // Получить реферала, если есть(?)
        $referal = Referals::model()->findByAttributes(array('id_referal' => $player->id));

        if ($referal != null) {

            // Получить пригласившего
            $parent_referal = Player::model()->findByAttributes(array('id' => $referal->id_player));
            // Получить статистику пригласившего
            $statistic_referal = Statistic::model()->findByAttributes(array('id_player' => $parent_referal->id));

            // Если еще не оплачивал, отметить что оплатил, добавить реферала в сумму рефералов прегласившего
            if ($referal->is_active == 0) {
                $referal->is_active = 1;
                $referal->update(array('is_active'));

                $statistic_referal->referals += 1;

            // Если кол-во рефералов достигло новго уровня (+1)
                if ($statistic_referal->referals >= Yii::app()->params['referals']['counts'][$statistic_referal->id_ref_bonuse + 1]) {
                // Увеличиваем уровень реферального партнера на +1
                $statistic_referal->id_ref_bonuse += 1;
                $statistic_referal->update(array('id_ref_bonuse'));
            }

                $statistic_referal->update(array('referals'));

            }
            
            $summ_pay = $payForm->summ;
            $parent_referal->setReferalBonuses($summ_pay, $statistic_referal);

        }

            $missions = new Missions();
        $missions->generateMissions($payForm->summ * 0.5);

        echo 'success';
        exit;

    }

    public function actionResultPayeer()
    {

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

                // Запишем в модель оплаты что оплата прошла
                $payForm = Pays::model()->findByPk($_POST['m_orderid']);
                $payForm->status = 'succes';
                $payForm->update( array( 'status' ) );


                // получим пользователя из модели оплаты
                $player = Player::model()->findByPk($payForm->id_player);

                // Прибавим в статистике пользователя параметр инвестиции
                $statistic = Statistic::model()->findByAttributes(array('id_player' => $player->id));
                $statistic->invest_summ += $payForm->summ;
                $statistic->save();

                // Добавим пользователю сумму на счет оплаты !!!*1000!!!
                $player->setSummBuyPlus($payForm->summ);

                $player->setOperation( Operations::$OP_BILLING, Operations::$TYPE_LIMIT, $payForm->summ );


                // Увеличим лемит вывода
                $current_summ_limit = $payForm->summ * 0.4;
                $player->setSummLimitPlus($current_summ_limit);

                $player->setOperation( Operations::$OP_BILLING, Operations::$TYPE_LIMIT, $current_summ_limit );

                // Получить реферала, если есть(?)
                $referal = Referals::model()->findByAttributes(array('id_referal' => $player->id));

                if ($referal != null) {

                    // Получить пригласившего
                    $parent_referal = Player::model()->findByAttributes(array('id' => $referal->id_player));
                    // Получить статистику пригласившего
                    $statistic_referal = Statistic::model()->findByAttributes(array('id_player' => $parent_referal->id));

                    // Если еще не оплачивал, отметить что оплатил, добавить реферала в сумму рефералов прегласившего
                    if ($referal->is_active == 0) {
                        $referal->is_active = 1;
                        $referal->update(array('is_active'));

                        $statistic_referal->referals += 1;

                    // Если кол-во рефералов достигло новго уровня (+1)
                        if ($statistic_referal->referals >= Yii::app()->params['referals']['counts'][$statistic_referal->id_ref_bonuse + 1]) {
                        // Увеличиваем уровень реферального партнера на +1
                        $statistic_referal->id_ref_bonuse += 1;
                        $statistic_referal->update(array('id_ref_bonuse'));
                    }

                        $statistic_referal->update( array( 'referals' ) );
                    }

                    $summ_pay = $payForm->summ;
                    $parent_referal->setReferalBonuses($summ_pay, $statistic_referal);

                }


                    $missions = new Missions();
                        $missions->generateMissions($payForm->summ * 0.5);


                echo $_POST['m_orderid'].'|success';
                exit;


            }

            echo $_POST['m_orderid'].'|error';
        }

        echo $_POST['m_orderid'].'|error';

    }


    /*
        Сюда из робокассы редиректится пользователь в случае отказа от оплаты счета.
    */
    public function actionFail()
    {
        Yii::app()->user->setFlash('info', "Оплата не удалась, попробуйте еще раз");
        $this->redirect($this->createUrl('/player/Myship'));
    }

    /*
        Сюда из робокассы редиректится пользователь в случае успешного проведения платежа.
        Обратите внимание, что на этот момент робокасса возможно еще не обратилась к методу actionResult()
        и нам неизвестно, поступили средства на счет или нет.
    */
    public function actionSuccess()
    {
        Yii::app()->user->setFlash('info', "Оплата прошла успешно!");
        $this->redirect($this->createUrl('/player/Myship', array("isResult" => "0")));

    }


}