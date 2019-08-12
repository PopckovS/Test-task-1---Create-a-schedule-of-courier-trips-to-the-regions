<?php 
require_once 'BaseModel.php'; 

$db = new BaseModel(); // Создание подключения к БД
$region  = BaseModel::getRegion(); // Выбрать все записи с регионами из таблицы Region, для отображения в поле формы
$courier = BaseModel::getCourier();// Выбрать все записи с регионами из таблицы Region, для отображения в поле формы

?>


<!-- Форма отправки данных для регистрации новой пеуздки в БД -->
 <div class="container">
 <div class="row main-form">
 <form id='ajaxFormRegion' class="" method="post" action="">
 
  <h4 class="cols-sm-2 control-label">Регистрация поездки</h4>

<!-- Регионы -->
 <div class="form-group">
 <label for="username" class="cols-sm-2 control-label">Регионы</label>
 <div class="cols-sm-10">
 <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
 <select class="form-control" name="region" id="region">
 	<?php 
 	$countRegion = count($region);
 	for ($i=0; $i < $countRegion; $i++) { 
 		echo "<option>";
 		echo $region[$i];
 		echo "</option>";
 	}
 	?>
 </select>
 </div>
 </div>
 </div>


<!-- Дата выезда из Москвы -->
 <div class="form-group">
 <label for="email" class="cols-sm-2 control-label">Дата выезда из Москвы</label>
 <div class="cols-sm-10">
 <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-clock-o fa" aria-hidden="true"></i></span>
 <input type="date" class="form-control" name="date" id="date" placeholder="Enter data"/>
 </div>
 </div>
 </div>



<!-- Курьеры -->
 <div class="form-group">
 <label for="username" class="cols-sm-2 control-label">Курьеры</label>
 <div class="cols-sm-10">
 <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
 <select class="form-control" name="courier" id="courier">
 	<?php 
 	$countCourier = count($courier);
 	for ($i=0; $i < $countCourier; $i++) { 
 		echo "<option>";
 		echo $courier[$i];
 		echo "</option>";
 	}
 	?>
 </select>
 </div>
 </div>
 </div>


 <div class="form-group ">
 	<button type="button" name='regionButton' id="regionButton" class="btn btn-primary btn-lg btn-block login-button">
 		Регистрация
 	</button>
 </div>
 
 </form>
 </div>
 </div>

<!-- Блок для отображения результата выполнения AJAX скрипта -->
<br>
<div id="result">
	<h4>Тут будет результат</h4>
</div>

