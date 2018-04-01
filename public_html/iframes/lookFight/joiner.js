/**
 * Created by Александр on 26.10.2015.
 * Игрок модель
 */
var Player = function (id, gfx, gfx_gun, gfx_engine, gfx_defend, strategy, name) {

    this.id = id;
    this.strategy = strategy;

    var is_win = false;
    var is_loose = false;

    var isDead = false;

    var ship = new Ship(gfx, gfx_gun, gfx_engine, gfx_defend, this);

    this.remove = function () {
        if (ship.ship.visible == false) {
            $('#player' + id).remove();
            isDead = true;

        }

        is_win = false;
        is_loose = false;
        ship.remove();

    }

    this.addship = function () {
        ship = new Ship(gfx, gfx_gun, gfx_engine, gfx_defend, this);
    }

    this.getName = function () {
        return name;
    }

    this.getIsDead = function () {
        return isDead;
    }

    this.getWin = function () {
        return is_win;
    }

    this.getLoose = function () {
        return is_loose;
    }

    this.getship = function () {
        return ship;
    }

    // Создать кораблик
    this.addshipMap = function (id) {

        if (isDead == true)
            return;

        ship.addshipMap(id);
    }

    this.ansverPlayer = function () {

        if( isDead == true )
            return;

        // Теперь перебираем эти действия от лица первого персонажа
        var ansver_players = [];

        var current_gun = this.strategy.split('');
        var my_gun = current_gun[step];

        players.forEach(function (player, key) {

            var gun = player.getPlayerStrategyForStep();


            if ( id != player.id && player.getIsDead() != true) {

                switch (my_gun) {
                    case "1":
                        if (gun == "1")
                            ansver_players[player.id] = 'Ничья';
                        else if (gun == "2")
                            ansver_players[player.id] = 'Выиграл';
                        else if (gun == "3")
                            ansver_players[player.id] = 'Проиграл';
                        break;

                    case "2":
                        if (gun == "1")
                            ansver_players[player.id] = 'Проиграл';
                        else if (gun == "2")
                            ansver_players[player.id] = 'Ничья';
                        else if (gun == "3")
                            ansver_players[player.id] = 'Выиграл';
                        break;

                    case "3":
                        if (gun == "1")
                            ansver_players[player.id] = 'Выиграл';
                        else if (gun == "2")
                            ansver_players[player.id] = 'Проиграл';
                        else if (gun == "3")
                            ansver_players[player.id] = 'Ничья';
                        break;
                }
            }

        });

        // Дополнительно проверяем если у других игроков он увидел как проигравших так и выигравших
        // то этот раунд никто не выиграл
        ansver_players.forEach(function (ansver) {

            if (ansver == 'Выиграл') {
                is_win = true;
            }
            if (ansver == 'Проиграл') {
                is_loose = true;
            }


        })

    }

    this.setAnimationForPlayer = function()
    {
        var current_gun = this.strategy.split('');
        var my_gun = current_gun[step];

        // Если есть только выигрывшие и ничья или проигравшие и ничья
        // то раунд или окончен или выбывают несколько игроков

        // если есть победители и проигравшие то возвращаем false / переход на другой раунд
        if (is_loose == true && is_win == true || is_loose == false && is_win == false) {

            is_loose = false;
            is_win = false;

            // Запустить анимацию ничья
            ship.startAnimationRoundNothin(my_gun);
            $('#player' + id).append(" <span style='color:#41B5D7;'>Ничья!</span>");

            return false;
        }
        else if (is_win == true) {

            $('#player' + id).append(" <span style='color:green;'>Победил! </span>");

            ship.startAnimationWin(my_gun);
            return 'win';
        }
        else if (is_loose == true) {

            $('#player' + id).append(" <span style='color:red;'>Проиграл! </span>");

            ship.addDead();
            ship.ship.visible = false;

            return 'loose';
        }
    }

    this.getNameGunt = function( type )
    {
        var name_type = '';

        switch( type )
        {
            case "1":
                name_type = "<img width='25' alt='Лазер' src='/iframes/lookFight/images/message_icon_blasters.jpg'>";
                break;
            case "2":
                name_type = "<img width='25' alt='Абордаж' src='/iframes/lookFight/images/message_icon_swords.jpg'>";
                break;

            case "3":
                name_type = "<img width='25' alt='Защитное поле' src='/iframes/lookFight/images/message_icon_flag.jpg'>";
                break;
        }

        return name_type;
    }


    this.getPlayerStrategyForStep = function () {
        var current_gun = this.strategy.split('');
        var step_gun = current_gun[step];

        return step_gun;
    }


}