[![Maintainability](https://api.codeclimate.com/v1/badges/41f99a51db2f3b9ed047/maintainability)](https://codeclimate.com/github/AslanAV/otp6-test/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/41f99a51db2f3b9ed047/test_coverage)](https://codeclimate.com/github/AslanAV/otp6-test/test_coverage)
[![Tests & Lint & Deploy](https://github.com/AslanAV/otp6-test/actions/workflows/main.yml/badge.svg)](https://github.com/AslanAV/otp6-test/actions/workflows/main.yml)
# Тестовое OPT6.RU

### 1. Реализовать crud для работы с заказами/товарами
#### Поля заказа:
- дата заказа
   - валидируемый формат: 07.07.2020
   - предусмотреть маску ввода: да
   - обязательность: да
- телефон
   - валидируемый формат:
   - +7 999 999 99 99
   - +79999999999
   - 89999999999
   - предусмотреть маску ввода: да
   - обязательность: нет
- email
   - валидируемый формат: email
   - обязательность: да
- адрес
   - в редактировании/создании заказа должна использоваться яндекс карта и осуществлено геокодирование(поиск по адресу/координатам). В отображении заказа адрес должна отображаться метка адреса
   - обязательность: нет
- состав заказа
   - в заказе должна быть возможность прикреплять товары из связанной модели Товар, с
   - указанием количества соответствующего товара. При изменении - сумма пересчитывается
- сумма заказа
   - валидируемый формат: минимальная сумма заказа 3000
  
#### Поля товара:
- название товара
  валидируемый формат:
  - минимальная длина названия - 3 символа
- цена товара
   - валидируемый формат: 
   - положительное число с плавающей точкой
  
#### Требования:
- в приложении должна быть реализована аутентификация администратора
- для аутентификации администратора использовать laravel breeze
- не использовать сторонние библиотеки для генерации crud
- для вывода списка заказов использовать библиотеку datatable
  
### 2. Заполнить базу 1000 фиктивными заказами и 1000 фиктивными товарами

### 3. Реализовать rest api для работы с заказами.
- список заказов с возможностью указания количества заказов на странице, необходимую
  страницу, фильтрацию результатов по дате
- создание заказа
- обновление заказа
- удаление заказа
- информация по отдельному заказу

#### Требования:
- возвращаемый формат json
- доступ должен осуществляться по генерируемому токену в пользователе
- api должен возвращать стандартные коды ответов на успешные запросы/неверный тип
  данных/некорректные запросы с описанием ошибок



### Общие требования:
- код проекта должен быть предоставлен в открытом репозиторие
- проект должен быть доступен по предоставленному ip/домену с указанием админских
  данных для входа

  
REST API (local)
```bash
http://localhost/api/
```

[Тесты API]()

## Setup project local

```shell
make setup
```

### Start server local
```shell
make start
```

***

## Setup project docker-compose
```shell
make compose-make-setup
```

### Start server docker-compose
```shell
make compose
```

### Stop server docker-compose
```shell
make compose-down
```
