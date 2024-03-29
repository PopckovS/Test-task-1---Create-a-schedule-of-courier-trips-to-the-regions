<br>
<h4>Создать расписание поездок курьеров в регионы.
Код должен быть написан без использования Фреймворка!
</h4>

Описание:<br>
Из Москвы в регионы отправляются с центрального склада курьеры с товаром. Время в пути известно. Количество поездок в регион не ограничено.<br>
Задание:<br><br>

<h4>Минимальный уровень решения задачи1:</h4>
1.	Вывести расписание поездок в регионы на текущую дату.<br>
2.	Рабочая форма для внесения данных в расписание с полями:<br>
1.	Регион<br>
2.	Дата выезда из Москвы<br>
3.	ФИО курьера<br>
4.	Информационное поле: Дата прибытия в регион (рассчитывается на основе данных по региону)<br><br>

<h4>Требования к форме:</h4>
1.	Одновременно курьер может быть только в одной поездке в регион.<br>
2.	Данные по поездкам должны вывестись на текущий день<br><br>

<h4>Стандартный уровень решения задачи:</h4>
1.	Вывести расписание поездок в регионы за выбираемый период.<br>
2.	Рабочая форма для внесения данных в расписание с полями:<br>
1.	Регион<br>
2.	Дата выезда из Москвы<br>
3.	ФИО курьера<br>
4.	Информационное поле: Дата прибытия в регион (рассчитывается на основе данных по региону)<br><br>

<h4>Требования к форме:</h4>
1.	Одновременно курьер может быть только в одной поездке в регион.<br>
2.	Длительность поездки (туда/обратно) задаётся в таблице БД регионов.<br>
1.	Заполнить данные по поездкам с июня 2018 года (скрипт заполнения прислать с остальными скриптами веб-приложения)<br><br>


<h4>Требования к веб-приложению:</h4>
1.	Веб-сервер: Apache + PHP/ Python<br>
2.	БД: MySQL/ PostgreSQL<br>
3.	jQuery(ajax-запросы в форме внесения поездки в регион)<br><br>


<h4>Информация:</h4>
Регионы:<br>
1.	Санкт-Петербург<br>
2.	Уфа<br>
3.	Нижний Новгород<br>
4.	Владимир<br>
5.	Кострома<br>
6.	Екатеринбург<br>
7.	Ковров<br>
8.	Воронеж<br>
9.	Самара<br>
10.	Астрахань<br>
Длительность нахождения в пути любое число дней<br>
Курьеры: Произвольно не менее 10 человек<br><br>

<h4>Прислать:</h4>
1.	Полностью веб-приложение (скрипты PHP, JS и т.д.)<br>
2.	БД MySQL – 3 таблицы:<br>
1.	Таблица с курьерами<br>
2.	Таблица с регионами<br>
3.	Таблица расписания поездок в регионы<br>
3.	Если веб-приложение развёрнуто с использованием специфичных настроек сервера Apache или Nginx, то прислать конфиг веб-сервера и php.<br>
