PHP Framework HLEB v1

Для тех, кто не читал инструкцию (https://phphleb.ru/ru/v1/)

Для запуска мини-фреймворка HLEB достаточно (1) скопировать папку с проектом из оригинального расположения
(используя только доверенные ссылки на скачивание с официального сайта) и назначить адрес ресурса
(2) в субдиректорию "public". (3) Установить права на разрешение записи всем пользователям
для папки "storage" и всех вложенных в неё папок и файлов.

Если используется хостинг, и в нём не позволено изменять название директории, в которую указывает домен,
на данном этапе можно переименовать папку "public", дав необходимое название.

Внимание! Данный микрофреймворк требует установленного PHP 7.0 и выше.

После выполнения этих действий можно проверить установку, набрав в адресной строке браузера назначенный ранее
(локально или на удаленном сервере) адрес ресурса. В случае успешной установки будет отображена страница-заглушка
с логотипом фреймворка.

После этого нужно изменить настройки ( в файле /start.hleb.php ) фреймворка под конкретные задачи. Если такой файл не
существует - необходимо скопировать его из файла /default.start.hleb.php

Свободная лицензия. Без гарантий.
