<?php  ?>

<!-- Форма отправки данных для внесения нового курьера в БД -->
 <div class="container">
 <div class="row main-form">
 <form id='ajaxFormCourier' class="" method="post" action="">
 
 <h4 class="cols-sm-2 control-label">Регистрация Курьера</h4>

<!-- ФИО Курьера -->
 <div class="form-group">
 <label for="name" class="cols-sm-2 control-label">ФИО курьера</label>
 <div class="cols-sm-10">
 <div class="input-group">
 <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
 <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"/>
 </div>
 </div>
 </div>

 <div class="form-group ">
 	<button type="button" id="courierButton" class="btn btn-primary btn-lg btn-block login-button">
 		Регистрация
 	</button>
 </div>

 
 </form>
 </div>
 </div>



<hr>
<div id="result">
	<h4>Тут будет результат</h4>
</div>

