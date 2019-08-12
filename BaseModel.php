<?php 


class BaseModel
{
	protected static $connect; // Подключение к PDO 

	/* Соединение с PDO */
	public function __construct()
	{
		// Путь к массиву данных подключения
		$array = $config =[
			'host' => 'mysql:host=localhost;dbname=Fregat;charset=utf8',
			'login' => 'root',
			'password' => ''
		];


		// Подключение к PDO, установка атрибутов и перехват исключений
		self::$connect = new PDO($array['host'],$array['login'],$array['password']);

		if (self::$connect) {
			//echo "Подключение удалось";
		}else{
			//echo "Подключение к БД провалено";
		}
	}


	/*
	@param  - string имя курьера для внесенив таблицу
	@return - bool результат внесения, получилось или нет
	Внести нового курьера в Бд в таблицу Courier 
	*/
	public static function setCourier(string $name): bool
	{
		$sql = "INSERT INTO Courier VALUES (null, '{$name}')";

		// Вернуть значение true/false как результат внесения данных в БД
		if(self::$connect->exec($sql)){
			return true;
		}else{
			return false;
		}
	}
	

	/*
		Последовательная серия методов, внести запись о предстоящей поездке
		увеличить ее дату (дата отезда + время на поездку)
		и вернуть дату окончания поездки для отображения в результате Ajax скрипта
		@param  - ряд параметров для внесения записи в регистрацию путешествия
		@return - bool результат выполнение true/false
	*/
	public static function setTravel($region, $data, $courier, $nameRegion)
	{
		$sql = "INSERT INTO Travel VALUES (null, '{$region}', '{$data}', '{$courier}', '{$data}')";
		self::$connect->exec($sql);

		$time = BaseModel::getTimeOfRegion($nameRegion);
		$id = BaseModel::getMaxId();
		BaseModel::plusDate($time, $id);
		return BaseModel::getArrive($id);
	}


	/*
		Получить и вернуть дату прибытия курьера в регион
	*/
	public static function getArrive($id)
	{
		$sql = "SELECT arrive FROM Travel WHERE id = ".$id;
		$result = self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_ASSOC)) {
			$arrive = $row['arrive'];
		}
		return $arrive;
	}
	

	/*
	Увели-ет дату на количество дней поездки
	*/
	public static function plusDate($time, $id)
	{
		$sql = "UPDATE Travel SET arrive = arrive + INTERVAL '{$time}' DAY WHERE id = ".$id;
		self::$connect->exec($sql);
	}


	/*
	Получить максим-й ID записи из таблицы
	@return - int это максим-й id из таблицы
	*/
	public static function getMaxId()
	{
		$sql = 'SELECT max(id) FROM Travel';
		$result =  self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_NUM)) {
			$id = $row['0'];
		}
		return $id;
	}


	/*
		@return - array Массив с именами всех имеющихся регионов
	*/
	public static function getRegion(): array
	{
		$sql = "SELECT name FROM Region";

		$result = self::$connect->query($sql);
		while ($row = $result->fetch(\PDO::FETCH_NUM)) {
			$array[] = $row[0];
		}
		return $array;
	}

	/*
		@return - array Массив с именами всех имеющихся курьеров
	*/
	public static function getCourier(): array
	{
		$sql = "SELECT name FROM Courier";

		$result = self::$connect->query($sql);
		while ($row = $result->fetch(\PDO::FETCH_NUM)) {
			$array[] = $row[0];
		}
		return $array;
	}


	/*
		@param  - string Название региона
		@return - date   дата отправки курьера в регион
	*/
	public static function getTimeOfRegion(string $region)
	{
		$sql = "SELECT travel_time FROM Region WHERE name = '{$region}'";

		$result = self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_NUM)) {
			$array = $row[0];
		}
		return $array;
	}


	/*
		Последовательный INNER JOIN запросы для зьятия всех записей 
		@param  - date 2 даты для выборки всех записей между этими датами
		@return - array Ассоц Массив со всеми запися где дты входят в указанный промежуток
	*/
	public static function getTravel($from, $to)
	{
		 $sql = "SELECT Region.name as region, Travel.departure as departure, 
		 		Courier.name as courier, Travel.arrive as arrive
				FROM Travel
				INNER JOIN Courier ON Travel.courier_id = Courier.id
				INNER JOIN Region  ON Travel.region_id  = Region.id
				WHERE departure BETWEEN '{$from}' and '{$to}'";

		$result = self::$connect->query($sql);
		while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
			$array[] = $row;
		}
		return $array;
	}


	/*
		@param  - string Название Курьера
		@return - int Номер запись в таблице
		Поулчить id запись, из таблицы где name равен переданному аргументу
	*/
	public static function getIdCourier(string $name)
	{
		$sql = "SELECT id FROM Courier WHERE name = '{$name}'";

		$result = self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_ASSOC)) {
			$res = $row['id'];
		}else{
			$res = 0;
		}
		return $res;
	}
	
	/*
		@param  - string Название Региона
		@return - int Номер запись в таблице
		Поулчить id запись, из таблицы где name равен переданному аргументу
	*/
	public static function getIdRegion(string $name)
	{
		$sql = "SELECT id FROM Region WHERE name = '{$name}'";

		$result = self::$connect->query($sql);
		if($row = $result->fetch(\PDO::FETCH_ASSOC)) {
			$res = $row['id'];
		}else{
			$res = 0;
		}
		return $res;
	}


	public static function d($array)
	{
		echo "<pre>".print_r($array,1)."</pre>";
	}

}
