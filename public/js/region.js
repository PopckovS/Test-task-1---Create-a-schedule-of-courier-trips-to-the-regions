/* Функция проверки нажатия кнопки на форме */
$( document ).ready(function() {
    $("#regionButton").click(
        function(){    
            sendAjaxFormRegion('result', 'ajaxFormRegion', 'ajax/action_ajax_form_region.php');
            return false; 
        }
    );
});
 
/* Фунция отправки Ajax запроса на сиполнение */
function sendAjaxFormRegion(result, ajax_form, url) {
 
    $.ajax({
        url:      url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        beforeSend: function(){
	 		$("#regionButton").prop("disabled", true); 
	 	},
        success: function(response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            $('#result').html(result.message+'<br>Регион: '+result.region+'<br>Дата отправления: '+result.date+'<br>Имя курьера: '
                +result.courier+'<br>дата прибытия: '+result.arrive);
            $("#regionButton").prop("disabled", false);
        },
        error: function(response) { // Данные не отправлены
            $('#result').html('Ошибка. Данные не отправлены.');
        }
    });

}
 


   