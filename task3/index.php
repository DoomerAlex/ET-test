<?php

require 'Rectangle.php';
require 'Circle.php';
require 'Pyramide.php';
require 'functions.php';

// создаем коллекцию объектов
$arrFigures = array();

// генерируем новые объекты
$arrFigures[] = Rectangle::random();
$arrFigures[] = Circle::random();
$arrFigures[] = Pyramide::random();

// добавляем объекты из файла
if (file_exists("figures.xml")) {
    foreach (getFileFigur("figures.xml") as $value) {
        $arrFigures[] = $value;
    }
}

// Сортируем фигуры по возрастанию площади
$arrFiguresSort = figureSort($arrFigures);

// запись данных в документ
saveFileFigur($arrFiguresSort, "figures.xml");

// вывод на экран
echo "<pre>";
print_r($arrFiguresSort);
echo "</pre>";

?>