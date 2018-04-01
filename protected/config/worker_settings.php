<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 13.10.2015
 * Time: 2:04
 */
return array(

    /**
     * Настройки добытчика, пока что прокачиваются две характеристики
     * 1) summ - Сумма, влияющаяя на вывод из игры
     * 2) 2x - Шанс собрать 2х прибыли в процентах
     */
    'params' => array(


        'worker' => array(

            'character' => array(
                'inform' => 'Добытчики используют оружие для добычи.',
                'types_shop' => array(
                    'guns' => 'Оружие',
                    'engine' => 'Двигатели'
                )
            ),


            'guns' => array(


                1 => array(

                    'id' => 1,
                    '2x' => 1,
                    'summ' => 10,

                    'gfx_ship' => '/images/items/worker/guns/1.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/1.png',

                    'title' => 'Крошкодробитель',
                    'decription' => 'Предназначен для дробления мелких камушков возле астеройдных поясов, есть шанс получить <span class="bold_red">2х</span> прибыль - <span class="bold_red">1%</span> '


                ),

                2 => array(

                    'id' => 2,
                    '2x' => 3,
                    'summ' => 15,

                    'gfx_ship' => '/images/items/worker/guns/2.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/2.png',

                    'title' => 'Гроза булыжников',
                    'decription' => ' С легкостью уничтожает булыжники и камушки средних размеров, иногда вышибает ценные металы и другие полесзные вещества! Шанс на получение двойной прибыли <span class="bold_red">3%</span> '


                ),

                3 => array(

                    'id' => 3,
                    '2x' => 5,
                    'summ' => 25,

                    'gfx_ship' => '/images/items/worker/guns/3.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/3.png',

                    'title' => 'Выжигатель',
                    'decription' => 'Может прожигать дырки в небольших метеоритах, способен приносить дополнительные ископаемые, что соответсвтенно увеличивает дневную выручку. Шанс на получение двойной прибыли <span class="bold_red">5%</span> '

                ),

                4 => array(

                    'id' => 4,
                    '2x' => 7,
                    'summ' => 35,

                    'gfx_ship' => '/images/items/worker/guns/4.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/4.png',

                    'title' => 'Прямоток',
                    'decription' => 'Легко справляется с булыжниками и метеоритами любых размеров, приносит обладателю стабильный шанс 7% увеличить чистую прибыль в течении дня! Шанс на получение двойной прибыли <span class="bold_red">7%</span>'

                ),

                5 => array(

                    'id' => 5,
                    '2x' => 10,
                    'summ' => 40,

                    'gfx_ship' => '/images/items/worker/guns/5.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/5.png',

                    'title' => 'Стандарт',
                    'decription' => 'Разработанный военными специалистами еще в далеком 2105 году, зарекомендовавший себя и посей день, стандартный лазер для добычи ископаемых в космосе. Шанс на получение двойной прибыли <span class="bold_red">10%</span>'


                ),

                6 => array(

                    'id' => 6,
                    '2x' => 15,
                    'summ' => 55,

                    'gfx_ship' => '/images/items/worker/guns/6.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/6.png',

                    'title' => 'Модифицированный',
                    'decription' => 'Это модификация стандартного лазера, используется в особых операциях, когда важны любые виды полезных ископаемыхю. Аккуратно извлекает добычу! Шанс на получение двойной прибыли <span class="bold_red">15%</span>'


                ),

                7 => array(

                    'id' => 7,
                    '2x' => 21,
                    'summ' => 75,

                    'gfx_ship' => '/images/items/worker/guns/7.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/7.png',

                    'title' => 'Прогресс-2120',
                    'decription' => 'Мечта всех Добытчиков космоса, легкий практичный, практически каждую неделю радует добытчиков дополнительными бонусами! Шанс на получение двойной прибыли <span class="bold_red">21%</span>'


                ),

                8 => array(

                    'id' => 8,
                    '2x' => 25,
                    'summ' => 90,

                    'gfx_ship' => '/images/items/worker/guns/8.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/8.png',

                    'title' => 'Крошитель астеройдов',
                    'decription' => 'Метеориты и булыжники это бесполезная трата времени, так считают обладатели "Крошителя астеройдов", они знают толк в своей работе! Шанс на получение двойной прибыли <span class="bold_red">25%</span>'


                ),

                9 => array(

                    'id' => 9,
                    '2x' => 33,
                    'summ' => 120,

                    'gfx_ship' => '/images/items/worker/guns/9.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/9.png',

                    'title' => 'Хирург - 2170',
                    'decription' => 'Новейшая модель лазера, извлекает ископаемые настолько точно, что его в народе прозвали "Хирург". Бонусы почти каждый день! Шанс на получение двойной прибыли <span class="bold_red">33%</span>'


                ),

                10 => array(

                    'id' => 10,
                    '2x' => 50,
                    'summ' => 280,

                    'gfx_ship' => '/images/items/worker/guns/10.png',
                    'gfx_ava' => '/images/items/worker/guns/avatar/10.png',

                    'title' => 'Аннигилятор',
                    'decription' => 'Те кто видел работу Аннигилятора в действии говорят, что до сих пор не могут придти в себя от увиденного! Он испепеляет все вокруг оставляя только самые ценные и нужные ископаемые! Шанс на получение двойной прибыли <span class="bold_red">50%</span>'


                ),


            ),

            'engine' => array(


                1 => array(

                    'id' => 1,
                    'time_speed' => 7200,
                    'summ' => 18,

                    'gfx_ship' => '/images/items/worker/engines/1.png',
                    'gfx_ava' => '/images/items/worker/engines/avatar/1.png',

                    'title' => 'Ускоритель',
                    'decription' => 'Обладает улучшенным запасом топлива и проходимостью! Повышает потенциал ускорения. Вместительность бака <span class="bold_red">14 часов полета</span>'


                ),

                2 => array(

                    'id' => 2,
                    'time_speed' => 10800,
                    'summ' => 25,

                    'gfx_ship' => '/images/items/worker/engines/2.png',
                    'gfx_ava' => '/images/items/worker/engines/avatar/2.png',

                    'title' => 'Автономный',
                    'decription' => ' Легок в установке и обслуживании. Для тех кто любит исследовать и покорять уголки космоса! Вместительность бака <span class="bold_red">15 часов полета</span>'


                ),

                3 => array(

                    'id' => 3,
                    'time_speed' => 18000,
                    'summ' => 45,

                    'gfx_ship' => '/images/items/worker/engines/3.png',
                    'gfx_ava' => '/images/items/worker/engines/avatar/3.png',

                    'title' => 'Яростный добытчик',
                    'decription' => ' Устанавливается в специальном сервисе, помогает сделать корабль автономным на долгое время! Вместительность бака <span class="bold_red">17 часов полета</span>'


                ),

                4 => array(

                    'id' => 4,
                    'time_speed' => 25200,
                    'summ' => 55,

                    'gfx_ship' => '/images/items/worker/engines/4.png',
                    'gfx_ava' => '/images/items/worker/engines/avatar/4.png',

                    'title' => 'Грвавитариус',
                    'decription' => ' Если вы хотите полной автономми, чтобы корабль работал в любое время и требовал заправки раз в 2 суток, то улучшайтесь до этого двигателя смело! Вместительность бака <span class="bold_red">19 часов полета</span>'


                ),

                5 => array(

                    'id' => 5,
                    'time_speed' => 32400,
                    'summ' => 70,

                    'gfx_ship' => '/images/items/killer/engines/5.png',
                    'gfx_ava' => '/images/items/killer/engines/avatar/5.png',

                    'title' => 'Вакумная тяга',
                    'decription' => 'Вы сможете исследовать самые глубины космоса, зарабатывать деньги и при этом заниматься своими делами не думая о заправке. <span class="bold_red">21 час полета</span>'


                ),

                6 => array(

                    'id' => 6,
                    'time_speed' => 43200,
                    'summ' => 90,

                    'gfx_ship' => '/images/items/killer/engines/6.png',
                    'gfx_ava' => '/images/items/killer/engines/avatar/6.png',

                    'title' => 'Адский дрифт',
                    'decription' => 'Вы видели хоть раз дрифт космического корабля, умальцы из космической ассоциации добились этого! <span class="bold_red">24 часа полета</span>'


                ),

                7 => array(

                    'id' => 7,
                    'time_speed' => 57600,
                    'summ' => 110,

                    'gfx_ship' => '/images/items/killer/engines/7.png',
                    'gfx_ava' => '/images/items/killer/engines/avatar/7.png',

                    'title' => 'Забудь про заправку',
                    'decription' => 'Отличная вещь для путешествий! <span class="bold_red">28 часов полета</span>',


                ),


                8 => array(

                    'id' => 8,
                    'time_speed' => 64800,
                    'summ' => 150,

                    'gfx_ship' => '/images/items/killer/engines/8.png',
                    'gfx_ava' => '/images/items/killer/engines/avatar/8.png',

                    'title' => 'Световой пояс',
                    'decription' => 'Скорость света это прошлый век, сейчас ваш корабль перемещается со скорость света в кубе, это Световой пояс, так прозвали его ученые, потомучто он одевается на корабль как пояс на человека! <span class="bold_red">30 часов полета</span>'


                ),

                9 => array(

                    'id' => 9,
                    'time_speed' => 72000,
                    'summ' => 190,

                    'gfx_ship' => '/images/items/killer/engines/9.png',
                    'gfx_ava' => '/images/items/killer/engines/avatar/9.png',

                    'title' => 'Световой пояс+',
                    'decription' => 'Модификация светового пояса! Добавляет дополнительно 8 часов полета <span class="bold_red">32 часа полета</span>'


                ),

                10 => array(

                    'id' => 10,
                    'time_speed' => 86400,
                    'summ' => 200,

                    'gfx_ship' => '/images/items/killer/engines/10.png',
                    'gfx_ava' => '/images/items/killer/engines/avatar/10.png',

                    'title' => 'Световой пояс, прорыв',
                    'decription' => 'Самая навороченная на сегодняшний день установка! <span class="bold_red">36 часов полета</span>'


                ),

            ),

            'defend' => array(

                1 => array(

                    'id' => 1,
                    'persent_mission' => 1.5,
                    'summ' => 9,

                    'gfx_ship' => '/images/items/killer/defend/1.png',
                    'gfx_ava' => '/images/items/killer/defend/avatar/1.png',

                    'title' => 'Чехол',
                    'decription' => 'Эту защиту так прозвали потому что это скорее чехол, чем полноценная защита, она дает минимальный эффект! Шанс удачно завершить миссию увеличивается на <span class="bold_red">0.5%</span>'


                ),

                2 => array(

                    'id' => 2,
                    'persent_mission' => 2,
                    'summ' => 19,

                    'gfx_ship' => '/images/items/killer/defend/2.png',
                    'gfx_ava' => '/images/items/killer/defend/avatar/2.png',

                    'title' => 'Чехол модификация',
                    'decription' => 'Это по сути тот же чехол но как утверждает разработчик, использованы стальные пластины толщиной несколько сантиметров! Шанс удачно завершить миссию увеличивается на <span class="bold_red">1.5%</span>'


                ),

                3 => array(

                    'id' => 3,
                    'persent_mission' => 3.5,
                    'summ' => 30,

                    'gfx_ship' => '/images/items/killer/defend/3.png',
                    'gfx_ava' => '/images/items/killer/defend/avatar/3.png',

                    'title' => 'Ржавая броня',
                    'decription' => 'Прямого попаданя конечно не выдержит, но осколки отскочат не повредив общивку! Шанс удачно завершить миссию увеличивается на <span class="bold_red">3.5%</span>'


                ),

                4 => array(

                    'id' => 4,
                    'persent_mission' => 5,
                    'summ' => 53,

                    'gfx_ship' => '/images/items/killer/defend/4.png',
                    'gfx_ava' => '/images/items/killer/defend/avatar/4.png',

                    'title' => 'Титаниум',
                    'decription' => 'Здесь, явное преимущество в миссиях обеспечено! Шанс удачно завершить миссию увеличивается на <span class="bold_red">5%</span>'


                ),

                5 => array(

                    'id' => 5,
                    'persent_mission' => 7.5,
                    'summ' => 70,

                    'gfx_ship' => '/images/items/killer/defend/5.png',
                    'gfx_ava' => '/images/items/killer/defend/avatar/5.png',

                    'title' => 'Призрачная',
                    'decription' => 'Говорят что эту броню специально изготовили из некой субстанции которая накапливается внутри обитаемых планет. Поговаривает что она сшита из душ умерших. Не знаю на сколько это правда но защищает она действительно замечательно! Шанс удачно завершить миссию увеличивается на <span class="bold_red">7.5%</span>'


                ),

                6 => array(

                    'id' => 6,
                    'persent_mission' => 10,
                    'summ' => 130,

                    'gfx_ship' => '/images/items/killer/defend/5.png',
                    'gfx_ava' => '/images/items/killer//defend/avatar/5.png',

                    'title' => 'Генератор защитного поля',
                    'decription' => 'Какими бы уловками не занимались маркетологи и пиарщики брони, но против науки не попрешь. Поэтому, представляем генератор защитного поля, он значительно повысит ваш шанс на удачное завершение миссий! Шанс удачно завершить миссию увеличивается на <span class="bold_red">10%</span>'


                ),

            ),

            // Уменьшает время выполнения миссий
            'artefact' => array(

                1 => array(

                    'id' => 1,
                    'persent' => 1,
                    'summ' => 12,

                    'gfx_ship' => '/images/items/killer/artefact/1.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/1.png',

                    'title' => 'Спутниковая тарелка',
                    'decription' => 'Помогает легче ориентироваться в пространстве, создает дополнительные условия для нахождения врагов. Время выполнения миссий <span class="bold_red">-1%</span>'

                ),

                2 => array(

                    'id' => 2,
                    'persent' => 3,
                    'summ' => 28,

                    'gfx_ship' => '/images/items/killer/artefact/9.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/9.png',

                    'title' => 'PipBoy',
                    'decription' => 'Универсальное устройство, которое пригодится как на корабле так и на чужой планете. Время выполнения миссий <span class="bold_red">-3%</span>'

                ),

                3 => array(

                    'id' => 3,
                    'persent' => 5,
                    'summ' => 49,

                    'gfx_ship' => '/images/items/killer/artefact/12.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/12.png',

                    'title' => 'Улучшающая присадка',
                    'decription' => 'Быстрый взлет, быстрое приземление, быстрые маневры. Все это в сумме дает отличный результат для выполнения миссий.  Время выполнения миссий <span class="bold_red">-5%</span>'

                ),

                4 => array(

                    'id' => 4,
                    'persent' => 7,
                    'summ' => 50,


                    'gfx_ship' => '/images/items/killer/artefact/18.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/18.png',

                    'title' => 'Дополнительный бак',
                    'decription' => 'Как всегда выручает в самый неожиданный момент или разочаровывает, если вы не позаботились об установке! Время выполнения миссий <span class="bold_red">-7%</span>'

                ),

                5 => array(

                    'id' => 5,
                    'persent' => 9,
                    'summ' => 80,


                    'gfx_ship' => '/images/items/killer/artefact/11.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/11.png',

                    'title' => 'Улучшенная навигационная система "Оракул"',
                    'decription' => 'Летайте точнее, паркуйтесь ближе вместе с активной системой "Оракул"!  Время выполнения миссий <span class="bold_red">-9%</span>'

                ),

                6 => array(

                    'id' => 6,
                    'persent' => 11,
                    'summ' => 97,


                    'gfx_ship' => '/images/items/killer/artefact/19.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/19.png',

                    'title' => 'Форсаж +',
                    'decription' => 'Турбонадув двигателя! Улучшает характеристики скорости, коорые так необходимы для быстрого выполнения миссий! Время выполнения миссий <span class="bold_red">-11%</span>'

                ),

                7 => array(

                    'id' => 7,
                    'persent' => 16,
                    'summ' => 120,


                    'gfx_ship' => '/images/items/killer/artefact/8.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/8.png',

                    'title' => 'Катушка квантовой запутанности',
                    'decription' => 'Обманывает время, давая вам дополнительное время! Время выполнения миссий <span class="bold_red">-16%</span>'

                ),

                8 => array(

                    'id' => 8,
                    'persent' => 20,
                    'summ' => 190,


                    'gfx_ship' => '/images/items/killer/artefact/26.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/26.png',

                    'title' => 'Навигационная вышка',
                    'decription' => 'Сильно сокращает время выполнения миссий, вам не приходится думать! Время выполнения миссий <span class="bold_red">-20%</span>'

                ),

                9 => array(

                    'id' => 9,
                    'persent' => 40,
                    'summ' => 259,


                    'gfx_ship' => '/images/items/killer/artefact/26.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/26.png',

                    'title' => 'Красный кристалл остановки времени',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-40%</span>'

                ),

                10 => array(

                    'id' => 10,
                    'persent' => 60,
                    'summ' => 390,


                    'gfx_ship' => '/images/items/killer/artefact/26.png',
                    'gfx_ava' => '/images/items/killer/artefact/avatar/26.png',

                    'title' => 'Синий кристалл остановки времени',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-60%</span>'

                ),
            ),


        ),


    )
);