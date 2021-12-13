<!DOCTYPE HTML>
<html lang="ru">
<head>
<meta charset = "UTF-8">
</head>
<body>
	<form action='1.php' method='post'>
		<input type="text" name="firstValue" class="numbers" placeholder="Первое число">
		<select class="operation" name="operation">
			<option value='addition'>+</option>
			<option value="divide">/</option>
		</select>
		<input type="text" name="secondValue" class="numbers" placeholder="Второе число">
		<input class="submit_form" type="submit" name="submit" value="=">
	</form>
</body>
</html>

<?php
//Проверка на введение значения
if (isset($_POST['submit']))
{
	$firstValue = $_POST['firstValue'];
	$secondValue = $_POST['secondValue'];
	$operation = $_POST['operation'];
	// Проверка валидации
	if (!$operation || (!$firstValue && $firstValue != '0') || (!$secondValue && $secondValue != '0')) //уточнить по поводу !
	{
		$errorResult = 'Заполните все поля';
	}
    else
	{
		if (!is_numeric($firstValue) || !is_numeric($secondValue)) //проверка на соотвествия значения числам
		{
			$errorResult = "Значения должны быть числами";
		}
		else
        	switch($operation)
		{
			case 'addition':
			$result = $firstValue + $secondValue;
				break;
			case 'divide':
				if( $secondValue == '0')
				$errorResult = "На ноль делить нельзя!";
			else
				$result = $firstValue / $secondValue;
				break;
		}
	}
    if (isset($errorResult))
	{
    	echo "<div class='errorResult'>Ошибка: $errorResult</div>";
    }
    else
	{
		echo "<div class='result'>Ответ: $result</div>";
    }
}
?>
