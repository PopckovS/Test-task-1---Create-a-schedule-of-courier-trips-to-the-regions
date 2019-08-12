<?php
require_once '../BaseModel.php'; 

/*
    Здесь проверок нетребуется, сами поля в html форме определены как type="datetime-local"
    в них нельзя занести неразрешенное значение.
*/
if (isset($_POST["from_date"])) { 

    $db = new BaseModel();
    $result = BaseModel::getTravel($_POST["from_date"], $_POST["to_date"]);
  
    // Переводим массив в JSON
    echo json_encode($result); 
}