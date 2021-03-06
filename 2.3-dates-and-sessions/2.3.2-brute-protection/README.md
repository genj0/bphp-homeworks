# Задача 2. Защита от перебора

## Описание
Во многих сервисах есть функция авторизации и самый простой способ несанкционированного доступа - brute force (полный перебор).
Заключается он в том, что к конкретному логину алгоритм автоматически перебирает все возможные пароли. 
Вам необходимо разработать защиту от перебора с логированием.

## Техническое задание
* Если пользователь вводит пароль три раза за минуту - считаем это попыткой перебора и выводим сообщение
`Слишком часто вводите пароль. Попробуйте еще раз через минуту`.
* Если разница между двумя вводами пароля меньше чем 5 секунд, то необходимо выводить такое же сообщение.
* В обоих случаях нужно не просто выводить сообщение, а реально завершать скрипт, до того как проверка соответствия
логина и пароля будет совершена.
* Данные о всех попытках несанкционированного доступа (если мы считаем, что это brute force), нужно записывать в файл:
    * Если файл еще не существует, то он должен создаваться с именем пользователя в названии.
    В файл будут записаны все попытки такого доступа. Значения должны быть вида:
    `%дата время%`.
    * Все значения должны быть на новой строке.
    
## Пример
Очень часто в сервисах есть пользователь с логином admin. Вполне логично, что злоумышленник будет
пытаться подобрать пароль к этой учетке. 
Для этого он пишет алгоритм, который автоматически перебирает пароли. 
Если вдруг мы видим, что ввод пароля происходит слишком быстро, то выводим сообщение об ошибке, и создается файл
с названием `admin`, внутри которого будет следующая запись: `31.03.2019 10:14:35`.
Каждая следующая попытка будет записываться в файл.

## Алгоритм выполнения
1. В файле [index.php](./index.php) напишите скрипт, который будет получать данные из [формы](./form.html).
2. В файле [index.php](./index.php) уже есть массив с пользовательскими данными. Ключ - логин пользователя. Значение - его пароль.
3. Напишите алгоритм, который проверяет данные и при неудачной попытке записывает в куку данные о попытке (только последние три).
4. Напишите алгоритм, который будет сравнивать время попытки с предыдущими и в случае понимания, что это попытка брутфорса,
выводит сообщение на экран и записывает в файл данные согласно ТЗ.
5. Сообщения об ошибке (которая не считается брутфорсом) и успешной авторизации могут быть любыми. Например error и ok соответственно.



**Обратите внимание на** [**рекомендации по сдаче домашнего задания**](https://github.com/netology-code/bphp-homeworks/blob/master/0-sharing/homework/README.md).
