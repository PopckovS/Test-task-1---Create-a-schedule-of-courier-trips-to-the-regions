/* Функция проверки нажатия кнопки на форме */
$( document ).ready(function() {
    $("#courierButton").click(
        function(){
            sendAjaxFormCourier('result', 'ajaxFormCourier', 'ajax/action_ajax_form_courier.php');
            return false; 
        }
    );
});
 
/* Фунция отправки Ajax запроса на сиполненеи */
function sendAjaxFormCourier(result, ajax_form, url) {
    $.ajax({
        url:      url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        beforeSend: function(){
	 		$("#courierButton").prop("disabled", true); 
	 	},
        success: function(response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            $('#result').html('Результат : '+result.message);
            $("#courierButton").prop("disabled", false);
        },
        error: function(response) { // Данные не отправлены
            $('#result').html('Ошибка. Данные не отправлены.');
        }
    });
}