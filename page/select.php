<?php 
?>

<!-- Форма отправки данных для регистрации новой пеуздки в БД -->
 <div class="container">
 <div class="row main-form">
 <form id='ajaxFormSelect' class="" method="post" action="">
 
  <h4 class="cols-sm-2 control-label">Узнать даты поездок</h4>

<!-- Регионы -->
 <div class="form-group">
 <label for="username" class="cols-sm-2 control-label">Дата от:</label>
 <div class="cols-sm-10">
 <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-clock-o fa" aria-hidden="true"></i></span>
<input type="date" class="form-control" name="from_date" id="from_date" placeholder="Enter data"/>
 </div>
 </div>
 </div>



<!-- Курьеры -->
 <div class="form-group">
 <label for="username" class="cols-sm-2 control-label">Дата до:</label>
 <div class="cols-sm-10">
 <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-clock-o fa" aria-hidden="true"></i></span>
<input type="date" class="form-control" name="to_date" id="to_date" placeholder="Enter data"/>
 </div>
 </div>
 </div>


 <div class="form-group ">
 	<button type="button" name='selectDate' id="selectDate" class="btn btn-primary btn-lg btn-block login-button">
 		Отправить
 	</button>
 </div>
 
 </form>
 </div>
 </div>



<hr>
<div id="result">
	<h4>Тут будет результат</h4>
</div>
