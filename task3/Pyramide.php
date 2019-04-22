<?php
require_once 'Figure.php';

// Пирамида
class Pyramide extends Figure
{
    protected $name = 'Pyramide';
    protected $edge; // количество граней 
    protected $height; // высота пирамиды
    protected $width; // ширина грани основания

    public function __construct(float $edge, float $height, float $width)
    {
        $this->edge = $edge;
        $this->height = $height;
        $this->width = $width;
        $this->area = $this->area();
    }

    // пирамида со случайными значениями
    public static function random()
    {
        $edge = rand(3, 20);
        $height = rand(1,100);
        $width = rand(1, 100);
        return new self($edge, $height, $width);
    }

    // площадь фигуры
    protected function area()
    {
        if($this->edge > 2 && $this->height > 0 && $this->width > 0){
            return $this->faceArea() * $this->edge + $this->baseArea();
        } else {
            return 0;
        }
    }

    // апофема боковой поверхности
    private function getApofema(){
        return sqrt(($this->getRadiusBaseCircle() ** 2) + ($this->height ** 2));
    }

    // периметр основания
    private function basePerimeter()
    {
        return $this->edge * $this->width;
    }

    // площадь основания
    private function baseArea(){
        return $this->basePerimeter() / 2 * $this->getRadiusBaseCircle();
    }

    // площадь боковой грани пирамиды
    private function faceArea()
    {
        return $this->basePerimeter() / 2 * $this->getApofema();
    }

    // радиус вписанной окружности для основания
    private function getRadiusBaseCircle()
    {
        return $this->width / ( 2 * tan( M_PI / $this->edge ) );
    }
}

?>