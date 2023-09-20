# Тестовое задание для XenLP
## Парсер для HTML DOM
### Вариант первый

Переписал код на библиотеке dom-crawler, так как phpQuery имела много функций в статусе Deprecated.

 [Предыдущий коммит:](https://github.com/Konkin-Ivan/html_dom_parser/tree/f08b825ac6ef908d156c18961b77201744e00306)

Зависимости:

```json

{
  "require-dev": {
    "symfony/var-dumper": "^6.3",
    "phpunit/phpunit": "^10.3"
  }
}

```
, для использования функции "dd();" и покрытие тестами кода.

### Не использовал
- оконные формы;
- созранение в базе данных.

### Использовал
- php версии 8.1;
- composer для управления автозагрузкой файлов и установки пакетов.

### Запуск и установка
- склонировать репозиторий;
- выполнить make start;

#### Доступные команды для make
##### composer:
- install
- validate

##### cocker-compose:
- up
- build
- stop

##### up && install:
- start

##### test:
- test