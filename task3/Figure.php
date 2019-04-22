<?php

abstract class Figure
{
    protected $area; // объем фигуры
    protected $name; // название фигуры

    abstract protected function area();
    abstract public static function random();

    // получить свойства объекта
    public function getInfo()
    {
        return get_object_vars($this);
    }

    // получить площадь фигуры 
    public function getArea()
    {
    	return $this->area;
    }
}

?>