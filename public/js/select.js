/* Функция проверки нажатия кнопки на форме */
$( document ).ready(function() {
    $("#selectDate").click(
        function(){    
            sendAjaxFormSelect('result', 'ajaxFormSelect', 'ajax/action_ajax_form_select.php');
            return false; 
        }
    );
});
 
/* Фунция отправки Ajax запроса на сиполненеи */
function sendAjaxFormSelect(result, ajax_form, url) {
 
    $.ajax({
        url:      url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        beforeSend: function(){
	 		$("#selectDate").prop("disabled", true); 
	 	},
        success: function(response) { //Данные отправлены успешно
            result = $.parseJSON(response);
            for (var i =0; i < result.length; i++){
                $('#result').append("<p>Регион : "+result[i].region+"<br/>Дата отправки : "+result[i].departure+
                "<br/> Имя курьера : "+result[i].courier+"<br/> Дата прибытия : "+result[i].arrive+"</p><hr>")
            }
            $("#regionButton").prop("disabled", false);
        },
        error: function(response) { // Данные не отправлены
            $('#result').html('Ошибка. Данные не отправлены.');
        }
    });
}
