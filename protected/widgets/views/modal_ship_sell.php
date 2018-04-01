

    <div style="" class="modal fade modal_ship_buy" id="Sellship" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="text-align: center;">

                <button type="button" class="btn_close_modal white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

                <h3 id="title_modal">Продать корабль за <?= $ship->getSummToSell() ?> <img width="35" src="/images/gold.png"></h3>

                <p>
                    Ваш корабль больше нельзя будет вернуть! Но вы сможете купить новый!
                </p>

                <img width="200" src="<?= $ship->gfx ?>">

                <div>
                    <a href="<?= Yii::app()->createUrl('player/sellship') ?>" class="btn btn-default">Продать</a>
                </div>

            </div>
        </div>
    </div>
