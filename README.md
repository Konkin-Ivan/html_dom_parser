# Тестовое задание для XenLP
## Парсер для HTML DOM
### Вариант первый

Установка необходимых библиотек, сборка докер-контейнеров, Базовый функционал в индексном файле. В этом коммите, я пробую разные библиотеки, нахожу наилучший рабочий вариант.

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