<?php

require_once '../BaseModel.php'; 

if (isset($_POST["name"])) { 

	// Формируем массив для JSON ответа
    $result = ['message' => $_POST["name"]];

    /* Проверка если введено число - ошибка
       Если строка пуста - ошибка 
       Если введена строка то курьер регистр-ся в БД */
    if (is_numeric($result["message"])) {
    	$result['message'] = 'Ошибка, это число! введите строку: Имя Фамилия';
    	echo json_encode($result); // Переводим массив в JSON
    }elseif(empty($result['message'])){
        $result['message'] = 'Ошибка, строка пуста! введите строку: Имя Фамилия';
        echo json_encode($result); // Переводим массив в JSON
    }else{
        $db = new BaseModel();
        $flag = BaseModel::setCourier($result["message"]);
        $result = ['message' => 'Успешно! '.$_POST['name']];// ['message' => 'Курьер зарегестрирован - '.$_POST["name"]];
        echo json_encode($result); // Переводим массив в JSON
    }
}

?>