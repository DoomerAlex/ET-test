<?php
require_once 'Figure.php';

// Круг
class Circle extends Figure
{
    protected $name = 'Circle';
    protected $radius; // радиус

    public function __construct(float $radius)
    {
        $this->radius = $radius;
        $this->area = $this->area();
    }

    // рандомная генерация фигуры
    public static function random()
    {
        return new self(rand(1,100));
    }

    // подсчет площади
    protected function area()
    {
        if($this->radius > 0){
            return M_PI * ($this->radius ** 2);
        } else {
            return 0;
        }
    }
}

?>