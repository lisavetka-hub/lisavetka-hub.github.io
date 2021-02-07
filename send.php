<html>
    <head>
        <title>Форма заявки с сайта</title>
    </head>
<body>
    <?php
        //проверяем, существуют ли переменные в массиве POST
        if(!isset($_POST['fio']) and !isset($_POST['email'])){
    ?> 
    <form action="send.php" method="post">
        <input type="text" name="fio" placeholder="Укажите ФИО" required>
        <input type="text" name="email" placeholder="Укажите e-mail" required>
        <input type="submit" value="Отправить">
    </form> 
  
    <?php
        } else {
        //показываем форму
        $fio = $_POST['fio'];
        $email = $_POST['email'];

        //функции фильтров
        //преобразует все символы, которые пользователь попытается добавить в форму("<" в '&lt;')
        $fio = htmlspecialchars($fio);
        $email = htmlspecialchars($email);

        //декодирует url, если пользователь попытается его добавить в форму
        $fio = urldecode($fio);
        $email = urldecode($email);
        //удалим пробелы с начала и конца строки
        $fio = trim($fio);
        $email = trim($email);

        //условие, которе проверит отправилась ли форма при помощи PHP на указанные адрес электронной почты
        /*if (mail("example@mail.ru", "Заявка с сайта", "ФИО:".$fio.". E-mail: ".$email ,"From: example2@mail.ru \r\n")){
        echo "Сообщение успешно отправлено";
        } else {
        echo "При отправке сообщения возникли ошибки";
        }*/
        }

        $to      = $email;
        $subject = 'Заявка с сайта';
        $message = 'hello';

        mail($to, $subject, $message);

        ini_set('display_errors','On');
        error_reporting('E_ALL');
    ?>
  </body>
</html>