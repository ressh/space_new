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


        'pirat' => array(

            'character' => array(
                'inform' => 'Пират - вы пират! Вы самый отъявленный бандит космоса. законы не для вас, на вас охотятся правительства многих стран. Но ваша прибыль самая большая. Вам доступны все улучшения!',
                'types_shop' => array(
                    'guns' => 'Оружие',
                    'engine' => 'Двигатели',
                    'defend' => 'Защита',
                    'artefact' => 'Артефакты'

                )
            ),


            'guns' => array(


                1 => array(

                    'id' => 1,
                    '2x' => 1,
                    'summ' => 570,

                    'gfx_ship' => '/images/items/pirat/guns/1.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/1.png',

                    'title' => 'Легкий лазер',
                    'decription' => 'Легкое и компактное ружие близкого боя <span class="bold_red">2х</span> прибыль - <span class="bold_red">1%</span> '


                ),

                2 => array(

                    'id' => 2,
                    '2x' => 3,
                    'summ' => 780,

                    'gfx_ship' => '/images/items/pirat/guns/2.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/2.png',

                    'title' => 'Стандартный лазер',
                    'decription' => 'Разработанный еще во времена демократии, может поражать как движемые цели, так и астеройды и прочие препятствия <span class="bold_red">3%</span> '


                ),

                3 => array(

                    'id' => 3,
                    '2x' => 5,
                    'summ' =>1410,

                    'gfx_ship' => '/images/items/pirat/guns/3.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/3.png',

                    'title' => 'Модифицированный стандарт',
                    'decription' => 'Доказавший свою эффективность Стандартный лазер, был модифицирован военными с целью получения нового оружия ближнего боя и им это удалось! Шанс на получение двойной прибыли <span class="bold_red">5%</span> '

                ),

                4 => array(

                    'id' => 4,
                    '2x' => 7,
                    'summ' => 2040,

                    'gfx_ship' => '/images/items/pirat/guns/4.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/4.png',

                    'title' => 'Невесомая катапульта',
                    'decription' => 'Эту пушку прозвали катапультой, потму что она стреляет ядрами как во времена морских баталий, выпускает ядра с околозвуковой скоростью, если бы в космосе распространялся звук, противники бы убегали от одного только звука! Шанс на получение двойной прибыли <span class="bold_red">7%</span>'

                ),

                5 => array(

                    'id' => 5,
                    '2x' => 10,
                    'summ' => 2880,

                    'gfx_ship' => '/images/items/pirat/guns/5.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/5.png',

                    'title' => 'Контра+',
                    'decription' => 'Говорят разработчики Контры, вдохновились при создании этой пушки какой-то консольной игрой, но мы к сожалению не можем утверждать что это правда, после великой интернет депрессии, когда компьютерный вирус Енигма-2030 уничтожил большую часть информации в интернете, мы не смогли узнать правду про Контру. Шанс на получение двойной прибыли <span class="bold_red">10%</span>'


                ),

                6 => array(

                    'id' => 6,
                    '2x' => 15,
                    'summ' => 4020,

                    'gfx_ship' => '/images/items/pirat/guns/6.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/6.png',

                    'title' => 'Телекинез-2110',
                    'decription' => 'Как вы можете видеть принцип этого оружия не стрелять а манипулировать предметами непосредственно в кабине или других частях вражеского корабля. Наводит не только травмы но и психологический эффект на противников. Шанс на получение двойной прибыли <span class="bold_red">15%</span>'


                ),

                7 => array(

                    'id' => 7,
                    '2x' => 22,
                    'summ' => 5220,

                    'gfx_ship' => '/images/items/pirat/guns/7.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/7.png',

                    'title' => 'Телекинез+',
                    'decription' => 'Не буду вдаваться в подробности, как устроена эта система, знаю, что разработчки по национальности русские. Этим оружием пользовались еще при захвате Америки в 2130 году. Ох как тогда жарко было, лучше не вспоминать! Шанс на получение двойной прибыли <span class="bold_red">22%</span>'


                ),

                8 => array(

                    'id' => 8,
                    '2x' => 27,
                    'summ' => 7920,

                    'gfx_ship' => '/images/items/pirat/guns/8.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/8.png',

                    'title' => 'Искусственный интелект',
                    'decription' => 'Как вы знаете у нас на земле работает парочка таких интелектов, они управлят стратегией, участвуют в кибер атаках! Но КАК разработчикам удалось поместить такую систему на корабль я честно не знаю. Честь им и хвала! Шанс на получение двойной прибыли <span class="bold_red">27%</span>'


                ),

                9 => array(

                    'id' => 9,
                    '2x' => 33,
                    'summ' => 8970,

                    'gfx_ship' => '/images/items/pirat/guns/9.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/9.png',

                    'title' => 'Боевые дроны',
                    'decription' => 'Имя искусственный интелект вы конечно же нагоняете страх на своих соперников но единственный его недостаток - это расстояние. С боевыми ботами такого нет. Вы запускаете их и сами находитесь на удаленном расстоянии, что в любой момент может вас защитить от пуль противника! Шанс на получение двойной прибыли <span class="bold_red">33%</span>'


                ),

                10 => array(

                    'id' => 10,
                    '2x' => 37,
                    'summ' => 11370,

                    'gfx_ship' => '/images/items/pirat/guns/10.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/10.png',

                    'title' => 'Боевые дроны доп. комплект',
                    'decription' => 'Два друга хорошо а 4 еще лучше! Вы уже оценили пользу от своих космических друзей, теперь мы предлагаем вам увеличить их в два раза! Шанс на получение двойной прибыли <span class="bold_red">33%</span>'


                ),

                11 => array(

                    'id' => 11,
                    '2x' => 40,
                    'summ' => 12870,

                    'gfx_ship' => '/images/items/pirat/guns/11.png',
                    'gfx_ava' => '/images/items/pirat/guns/avatar/11.png',

                    'title' => 'Боевые дроны доп. комплект + Аннигилятор',
                    'decription' => 'Если врагов много и ваши дроны не справляются, установите Аннигилятор, он поможет избавиться от всех врагов! Шанс на получение двойной прибыли <span class="bold_red">45%</span>'


                ),



            ),

            'engine' => array(


                1 => array(

                    'id' => 1,
                    'time_speed' => 7200,
                    'summ' => 294,

                    'gfx_ship' => '/images/items/pirat/engines/1.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/1.png',

                    'title' => 'Ускоритель',
                    'decription' => 'Обладает улучшенным запасом топлива и проходимостью! Повышает потенциал ускорения. Вместительность бака <span class="bold_red">14 часов полета</span>'


                ),

                2 => array(

                    'id' => 2,
                    'time_speed' => 10800,
                    'summ' => 465,

                    'gfx_ship' => '/images/items/pirat/engines/2.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/2.png',

                    'title' => 'Автономный',
                    'decription' => ' Легок в установке и обслуживании. Для тех кто любит исследовать и покорять уголки космоса! Вместительность бака <span class="bold_red">15 часов полета</span>'


                ),

                3 => array(

                    'id' => 3,
                    'time_speed' => 18000,
                    'summ' => 945,

                    'gfx_ship' => '/images/items/pirat/engines/3.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/3.png',

                    'title' => 'Яростный торговец',
                    'decription' => ' Устанавливается в специальном сервисе, помогает сделать корабль автономным на долгое время! Вместительность бака <span class="bold_red">17 часов полета</span>'


                ),

                4 => array(

                    'id' => 4,
                    'time_speed' => 25200,
                    'summ' => 1605,

                    'gfx_ship' => '/images/items/pirat/engines/4.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/4.png',

                    'title' => 'Грвавитариус',
                    'decription' => ' Если вы хотите полной автономми, чтобы корабль работал в любое время и требовал заправки раз в 2 суток, то улучшайтесь до этого двигателя смело! Вместительность бака <span class="bold_red">19 часов полета</span>'


                ),

                5 => array(

                    'id' => 5,
                    'time_speed' => 32400,
                    'summ' => 3300,

                    'gfx_ship' => '/images/items/pirat/engines/5.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/5.png',

                    'title' => 'Вакумная тяга',
                    'decription' => 'Вы сможете исследовать самые глубины космоса, зарабатывать деньги и при этом заниматься своими делами не думая о заправке. <span class="bold_red">21 час полета</span>'


                ),

                6 => array(

                    'id' => 6,
                    'time_speed' => 43200,
                    'summ' => 5700,

                    'gfx_ship' => '/images/items/pirat/engines/6.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/6.png',

                    'title' => 'Адский дрифт',
                    'decription' => 'Вы видели хоть раз дрифт космического корабля, умельцы из космической ассоциации добились этого! <span class="bold_red">24 часа полеета</span>'


                ),

                7 => array(

                    'id' => 7,
                    'time_speed' => 57600,
                    'summ' => 8100,

                    'gfx_ship' => '/images/items/pirat/engines/7.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/7.png',

                    'title' => 'Забудь про заправку',
                    'decription' => 'Отличная вещь для путешествий! <span class="bold_red">28 часов полета</span>',


                ),


                8 => array(

                    'id' => 8,
                    'time_speed' => 64800,
                    'summ' => 12300,

                    'gfx_ship' => '/images/items/pirat/engines/8.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/8.png',

                    'title' => 'Световой пояс',
                    'decription' => 'Скорость света это прошлый век, сейчас ваш корабль перемещается со скорость света в кубе, это Световой пояс, так прозвали его ученые, потомучто он одевается на корабль как пояс на человека! <span class="bold_red">30 часов полета</span>'


                ),

                9 => array(

                    'id' => 9,
                    'time_speed' => 72000,
                    'summ' => 14000,

                    'gfx_ship' => '/images/items/pirat/engines/9.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/9.png',

                    'title' => 'Световой пояс+',
                    'decription' => 'Модификация светового пояса! Добавляет дополнительно 8 часов полета <span class="bold_red">32 часа полета</span>'


                ),

                10 => array(

                    'id' => 10,
                    'time_speed' => 86400,
                    'summ' => 16000,

                    'gfx_ship' => '/images/items/pirat/engines/10.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/10.png',

                    'title' => 'Кровавый агрессор',
                    'decription' => 'Этот двигатель - разработка секретных военных технологий забытой цивилизации Генелиус, которые изчезли из нашей вселенной после изобретению межгалактических ворот. <span class="bold_red">36 часов полета</span>'


                ),

                11 => array(

                    'id' => 11,
                    'time_speed' => 100800,
                    'summ' => 100000,

                    'gfx_ship' => '/images/items/pirat/engines/11.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/11.png',

                    'title' => 'Закаленный пират',
                    'decription' => 'Уникальный и редкий экземпляр забытой цивилизации Генелиус, <span class="bold_red">40 часов полета</span>'


                ),

                12 => array(

                    'id' => 12,
                    'time_speed' => 115200,
                    'summ' => 500000,

                    'gfx_ship' => '/images/items/pirat/engines/12.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/12.png',

                    'title' => 'Кровь галактики',
                    'decription' => 'Единственный в своем экземпляре. Разработанный сумашедшим ученым Фридриком Гауссом<span class="bold_red">44 часов полета</span>'

                ),

                13 => array(

                    'id' => 13,
                    'time_speed' => 129600,
                    'summ' => 1000000,

                    'gfx_ship' => '/images/items/pirat/engines/13.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/13.png',

                    'title' => 'Гаусс 1',
                    'decription' => 'Еще одна новинка от Фридрика Гаусса! <span class="bold_red">48 часов полета</span>'

                ),

                14 => array(

                    'id' => 14,
                    'time_speed' => 144400,
                    'summ' => 2500000,

                    'gfx_ship' => '/images/items/pirat/engines/14.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/14.png',

                    'title' => 'Японский Щит',
                    'decription' => 'Такого вы еще не видели, Японцы превзошли всех в космических технологиях, создали уникальны сингулярный двигатель не похожий ни на что остальное! <span class="bold_red">52 часов полета</span>'

                ),

                15 => array(

                    'id' => 15,
                    'time_speed' => 158400,
                    'summ' => 5500000,

                    'gfx_ship' => '/images/items/pirat/engines/15.png',
                    'gfx_ava' => '/images/items/pirat/engines/avatar/15.png',

                    'title' => 'Бездна',
                    'decription' => 'Российской вооружение, лучшее в мире. Двигатель черная бездна тому прямое доказательство. Его просто не видно но он работает! <span class="bold_red">52 часов полета</span>'

                ),

            ),

            'defend' => array(

                1 => array(

                    'id' => 1,
                    'persent_mission' => 0.5,
                    'summ' => 237,

                    'gfx_ship' => '/images/items/pirat/defend/1.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/1.png',

                    'title' => 'Чехол',
                    'decription' => 'Эту защиту так прозвали потому что это скорее чехол, чем полноценная защита, она дает минимальный эффект! Шанс удачно завершить миссию увеличивается на <span class="bold_red">+0.5%</span>'


                ),

                2 => array(

                    'id' => 2,
                    'persent_mission' => 1.5,
                    'summ' => 387,

                    'gfx_ship' => '/images/items/pirat/defend/2.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/2.png',

                    'title' => 'Чехол модификация',
                    'decription' => 'Это по сути тот же чехол но как утверждает разработчик, использованы стальные пластины толщиной несколько сантиметров! Шанс удачно завершить миссию увеличивается на <span class="bold_red">+1.5%</span>'


                ),

                3 => array(

                    'id' => 3,
                    'persent_mission' => 3.5,
                    'summ' => 1710,

                    'gfx_ship' => '/images/items/pirat/defend/3.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/3.png',

                    'title' => 'Ржавая броня',
                    'decription' => 'Прямого попаданя конечно не выдержит, но осколки отскочат не повредив общивку! Шанс удачно завершить миссию увеличивается на <span class="bold_red">+3.5%</span>'


                ),

                4 => array(

                    'id' => 4,
                    'persent_mission' => 5,
                    'summ' => 3900,

                    'gfx_ship' => '/images/items/pirat/defend/4.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/4.png',

                    'title' => 'Титаниум',
                    'decription' => 'Здесь, явное преимущество в миссиях обеспечено! Шанс удачно завершить миссию увеличивается на <span class="bold_red">+5%</span>'


                ),

                5 => array(

                    'id' => 5,
                    'persent_mission' => 7.5,
                    'summ' => 8100,

                    'gfx_ship' => '/images/items/pirat/defend/5.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/5.png',

                    'title' => 'Призрачная',
                    'decription' => 'Говорят что эту броню специально изготовили из некой субстанции которая накапливается внутри обитаемых планет. Поговаривает что она сшита из душ умерших. Не знаю на сколько это правда но защищает она действительно замечательно! Шанс удачно завершить миссию увеличивается на <span class="bold_red">+7.5%</span>'


                ),

                6 => array(

                    'id' => 6,
                    'persent_mission' => 10,
                    'summ' => 21000,

                    'gfx_ship' => '/images/items/pirat/defend/5.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/5.png',

                    'title' => 'Генератор защитного поля',
                    'decription' => 'Какими бы уловками не занимались маркетологи и пиарщики брони но против науки не попрешь. Поэтому, представляем генератор защитного поля, он значительно повысит ваш шанс на удачное завершение миссий! Шанс удачно завершить миссию увеличивается на <span class="bold_red">+10%</span>'


                ),

                7 => array(

                    'id' => 7,
                    'persent_mission' => 13,
                    'summ' => 321000,

                    'gfx_ship' => '/images/items/pirat/defend/6.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/6.png',

                    'title' => 'Защита с турелью',
                    'decription' => 'Уникальная турель защищает корбль маленькими выстрелами от  <span class="bold_red">+13%</span>'


                ),

                8 => array(

                    'id' => 8,
                    'persent_mission' => 15,
                    'summ' => 721000,

                    'gfx_ship' => '/images/items/pirat/defend/7.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/7.png',

                    'title' => 'Рыцарская броня',
                    'decription' => 'Эта броня выполнена в уникальной технологии защиты корпуса от любых ударов, а сисстема установки поглощает любые столкновения, пассажиры не чувствуют воздействия.  <span class="bold_red">+15%</span>'


                ),

                9 => array(

                    'id' => 9,
                    'persent_mission' => 18,
                    'summ' => 1421000,

                    'gfx_ship' => '/images/items/pirat/defend/8.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/8.png',

                    'title' => 'Чешуя Дракона',
                    'decription' => 'Это действительно так. Наши генные инженеры вывели настоящих драконо и теперь делают броню из их чашуи. <span class="bold_red">+15%</span>'


                ),

                10 => array(

                    'id' => 10,
                    'persent_mission' => 20,
                    'summ' => 2421000,

                    'gfx_ship' => '/images/items/pirat/defend/9.png',
                    'gfx_ava' => '/images/items/pirat/defend/avatar/9.png',

                    'title' => 'Гладиатор Бейн',
                    'decription' => 'Броня гладиатора Бейна, это наверно одна из загаток вселенной, Бейн был гладиатором и каждый раз побеждал на арене! Его броня обладает поистине магической силой! <span class="bold_red">+20%</span>'


                ),
            ),

            // Уменьшает время выполнения миссий
            'artefact' => array(

                1 => array(

                    'id' => 1,
                    'persent' => 1,
                    'summ' => 312,

                    'gfx_ship' => '/images/items/pirat/artefact/1.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/1.png',

                    'title' => 'Спутниковая тарелка',
                    'decription' => 'Помогает легче ориентироваться в пространстве, создает дополнительные условия для нахождения врагов. Время выполнения миссий <span class="bold_red">-1%</span>'

                ),

                2 => array(

                    'id' => 2,
                    'persent' => 3,
                    'summ' => 598,

                    'gfx_ship' => '/images/items/pirat/artefact/9.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/9.png',

                    'title' => 'PipBoy',
                    'decription' => 'Универсальное устройство, которое пригодится как на корабле так и на чужой планете. Время выполнения миссий <span class="bold_red">-3%</span>'

                ),

                3 => array(

                    'id' => 3,
                    'persent' => 5,
                    'summ' => 879,

                    'gfx_ship' => '/images/items/pirat/artefact/12.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/12.png',

                    'title' => 'Улучшающая присадка',
                    'decription' => 'Быстрый взлет, быстрое приземление, быстрые маневры. Все это в сумме дает отличный результат для выполнения миссий.  Время выполнения миссий <span class="bold_red">-5%</span>'

                ),

                4 => array(

                    'id' => 4,
                    'persent' => 7,
                    'summ' => 1310,


                    'gfx_ship' => '/images/items/pirat/artefact/18.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/18.png',

                    'title' => 'Дополнительный бак',
                    'decription' => 'Как всегда выручает в самый неожиданный момент или разочаровывает, если вы не позаботились об установке! Время выполнения миссий <span class="bold_red">-7%</span>'

                ),

                5 => array(

                    'id' => 5,
                    'persent' => 9,
                    'summ' => 2460,


                    'gfx_ship' => '/images/items/pirat/artefact/11.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/11.png',

                    'title' => 'Улучшенная навигационная система "Оракул"',
                    'decription' => 'Летайте точнее, паркуйтесь ближе вместе с активной системой "Оракул"!  Время выполнения миссий <span class="bold_red">-9%</span>'

                ),

                6 => array(

                    'id' => 6,
                    'persent' => 11,
                    'summ' => 2967,


                    'gfx_ship' => '/images/items/pirat/artefact/19.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/19.png',

                    'title' => 'Форсаж +',
                    'decription' => 'Турбонадув двигателя! Улучшает характеристики скорости, коорые так необходимы для быстрого выполнения миссий! Время выполнения миссий <span class="bold_red">-11%</span>'

                ),

                7 => array(

                    'id' => 7,
                    'persent' => 16,
                    'summ' => 3000,


                    'gfx_ship' => '/images/items/pirat/artefact/8.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/8.png',

                    'title' => 'Катушка квантовой запутанности',
                    'decription' => 'Обманывает время, давая вам дополнительное время! Время выполнения миссий <span class="bold_red">-16%</span>'

                ),

                8 => array(

                    'id' => 8,
                    'persent' => 20,
                    'summ' => 4990,


                    'gfx_ship' => '/images/items/pirat/artefact/26.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/26.png',

                    'title' => 'Навигационная вышка',
                    'decription' => 'Сильно сокращает время выполнения миссий, вам не приходится думать! Время выполнения миссий <span class="bold_red">-20%</span>'

                ),

                9 => array(

                    'id' => 9,
                    'persent' => 24,
                    'summ' => 5990,


                    'gfx_ship' => '/images/items/pirat/artefact/6.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/6.png',

                    'title' => 'Красный кристалл остановки времени',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-24%</span>'

                ),

                10 => array(

                    'id' => 10,
                    'persent' => 26,
                    'summ' => 7990,


                    'gfx_ship' => '/images/items/pirat/artefact/5.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/5.png',

                    'title' => 'Синий кристалл остановки времени',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-26%</span>'

                ),

                11 => array(

                    'id' => 11,
                    'persent' => 28,
                    'summ' => 17990,


                    'gfx_ship' => '/images/items/pirat/artefact/4.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/4.png',

                    'title' => 'Зеленый кристалл остановки времени',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-28%</span>'

                ),

                12 => array(

                    'id' => 12,
                    'persent' => 30,
                    'summ' => 57990,


                    'gfx_ship' => '/images/items/pirat/artefact/27.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/27.png',

                    'title' => 'Кристализатор времени',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-30%</span>'

                ),

                13 => array(

                    'id' => 13,
                    'persent' => 33,
                    'summ' => 157990,


                    'gfx_ship' => '/images/items/pirat/artefact/28.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/28.png',

                    'title' => 'Держатель межгалактического рукава',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-33%</span>'

                ),


                14 => array(

                    'id' => 14,
                    'persent' => 35,
                    'summ' => 357990,


                    'gfx_ship' => '/images/items/pirat/artefact/29.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/29.png',

                    'title' => 'Ускоритель скорости света',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-35%</span>'

                ),

                15 => array(

                    'id' => 15,
                    'persent' => 37,
                    'summ' => 1057990,


                    'gfx_ship' => '/images/items/pirat/artefact/30.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/30.png',

                    'title' => 'Телепортатор',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-37%</span>'

                ),

                16 => array(

                    'id' => 16,
                    'persent' => 40,
                    'summ' => 2057990,


                    'gfx_ship' => '/images/items/pirat/artefact/31.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/31.png',

                    'title' => 'Улучшенный Телепортатор',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-40%</span>'

                ),


                17 => array(

                    'id' => 17,
                    'persent' => 45,
                    'summ' => 4057990,


                    'gfx_ship' => '/images/items/pirat/artefact/32.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/32.png',

                    'title' => 'Улучшенный ускоритель скорости света',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-45%</span>'

                ),

                18 => array(

                    'id' => 18,
                    'persent' => 47,
                    'summ' => 10000000,


                    'gfx_ship' => '/images/items/pirat/artefact/33.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/33.png',

                    'title' => 'Улучшенный держатель межгалактического рукаваа',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-47%</span>'

                ),

                19 => array(

                    'id' => 19,
                    'persent' => 50,
                    'summ' => 15000000,


                    'gfx_ship' => '/images/items/pirat/artefact/34.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/34.png',

                    'title' => 'Установка притяжение вселенной',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-50%</span>'

                ),


                20 => array(

                    'id' => 19,
                    'persent' => 55,
                    'summ' => 25000000,


                    'gfx_ship' => '/images/items/pirat/artefact/35.png',
                    'gfx_ava' => '/images/items/pirat/artefact/avatar/35.png',

                    'title' => 'Исполнитель желаний',
                    'decription' => 'Во время межзвездного перелета существенно сокращает время на выполнение миссий! Время выполнения миссий <span class="bold_red">-55%</span>'

                ),
            ),


        ),


    )
);