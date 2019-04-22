<?php
require_once 'Figure.php';

// Прямоугольник
class Rectangle extends Figure
{
    protected $name = 'Rectangle';
    protected $height; // высота
    protected $width; // ширина

    public function __construct(float $height,float $width)
    {
        $this->height = $height;
        $this->width = $width;
        $this->area = $this->area();
    }

    // рандомная генерация фигуры
    public static function random()
    {
        $width = rand(1,100);
        $height = rand(1,100);
        return new self($height, $width);
    }

    // подсчет площади
    protected function area()
    {
        if($this->height > 0 && $this->width > 0){
            return $this->height * $this->width;
        } else {
            return 0;
        }
    }
}

?>