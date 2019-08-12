<?php 
/*
	Класс Роутера - на основе GET параметров определ-ет какую страницу надо подключить, если нет то 
	выдает страницу 404, методы getParam и dispatch Инкапсулированы, вход в класс только через метод start.
	класс обьявлен как final и не может иметь наследников
*/
final class Router
{

	/* Вывода всего в удобно читаемом виде */
	public static function d($array)
	{
		echo "<pre>".print_r($array,1)."</pre>";
	}


	/*
	@param - строка с явными GET параметрами из Супер Глоб.Массива $_SERVER['QUERY_STRING']
	Метод start - точка входа в класс
	*/
	public static function start(string $gets)
	{
		/* Если URL пуст то я передаю ему параметр = region, таким образом
		клиент не может войти на страницу которой несущест-ет, он всегда будет перенаправлен */
		if ($gets == '') {
			$gets = 'page=region';
		}

		$result = self::getParam($gets);
		self::dispatch($result);
	}


	/* 
	@param  = Строка из супер.глоб.массива со всеми GET параметрами из URL строки
	@return = Ассоц Массив где key = название GET параметра, value = его значение
	разбивает все явные get параметры на Ассоц массив и возвращает его 
	*/
	private static function getParam(string $array): array
	{
		$array = explode('&', $array);
		$count = count($array);
		for ($i=0; $i < $count; $i++) { 
			list($key, $value) = explode('=', $array[$i]);
			$result[$key] = $value;
		}
		return $result;
	}


	/*
	@param - Массив с get параметрами разбитый на Ассоц Массив
	Загружает ссылки на остальные страницы сайта, и блок с информацией, какие русерсы исп-сь для создания сайта
	На основе полученных GET параметров загружает нужную страницу, если нету,ошибка,или пусто 
	то загружает страницу 404.
	*/
	private static function dispatch(array $get): void
	{
		/* Если искомая страница есть в GET параметре как page, и она является
		одной из страниц сайта в директории page/... то подключить ее, 
		если нет то отдать страницу 404 */
		if (isset($get['page']) and is_file('page/'.$get['page'].'.php')) {
			$page = $get['page'];
			require_once 'public/links.html'; // Подключение ссылок на остальн-е страницы сайта
			require_once 'public/inform.html';// Подключение блока с информац-ей о использ-х ресурсах 
			require_once "page/".$page.".php"; // Подключение текущей страницы сайта
		}else{
			require_once 'errors/page404.html';//Подключение страницы ошибок 404 
		}
	}
}

?>
