<?php 
require_once 'router.php';    // Класс запускает весь сайт и опред-ет какую страницу показать
require_once 'BaseModel.php'; // Класс запуска соед-я с СУБД MySQL через PDO 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Тестовой задание №1</title>
	<!-- Подключение стилий для  Bootstrap   -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<!-- Подключение стилий для  font-awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<!-- Основные стили для сайта --> 
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>

<?php 
/* Функция Роутера - запускает весь сайт и опред. старницу на основе Get параметра page 
если параметр неопределен то перенаправит на страницу 404 */
Router::start($_SERVER['QUERY_STRING']);
?>

<!-- Подключение jQ --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Скрипт для регистрации через Ajax нового курьера в таблице Courier  --> 
<script type="text/javascript" src="public/js/courier.js"></script>
<!-- Скрипт для регистрации через Ajax новой поездки курьера в регионы, внесени записи в таблицу Region --> 
<script type="text/javascript" src="public/js/region.js"></script>
<!-- Скрипт для выблорки через Ajax зарегестрированных поездок между двумя датами --> 
<script type="text/javascript" src="public/js/select.js"></script>
</body>
</html>
