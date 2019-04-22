<?php

// Сортировка фигур по убыванию
function figureSort($figures)
{
    $result = array();
    while(count($figures) > 0)
    {
        $max = null; // минимальное значение площади фигуры
        $maxKey = 0; // ключ минимального значения
        foreach($figures as $key => $figure)
		{
			$area = $figure->getArea();
			if($max === null){
				$max = $area;
				$maxKey = $key;
			} else if($area >= $max) {
				$max = $area;
				$maxKey = $key;
			}
		}
		$result[] = $figures[$maxKey];
		unset($figures[$maxKey]);
	}
	return $result;
}

// получить фигуры из файла
function getFileFigur($filename)
{
    if (file_exists($filename)) {
        $result = array();
        $xml = simplexml_load_file("figures.xml");
        foreach($xml->figure as $figure){
            switch ($figure->name) {
                case 'Rectangle':
                    $result[] = new Rectangle((float)$figure->height, (float)$figure->width);
                    break;
                case 'Circle':
                    $result[] = new Circle((float)$figure->radius);
                    break;
                case 'Pyramide':
                    $result[] = new Pyramide((float)$figure->edge, (float)$figure->height, (float)$figure->width);
                    break;
            }
        }
        return $result;
    } else {
        return false;
    }
}

// сохранить фигуры в файл
function saveFileFigur($figurs, $filename)
{
    try {
        $dom = new DomDocument('1.0', 'UTF-8');
        $xmlFigure = $dom->appendChild($dom->createElement('figures'));
        foreach($figurs as $figur)
        {
            $xmlItem = $xmlFigure->appendChild($dom->createElement('figure'));
            foreach($figur->getInfo() as $key => $value)
            {
                $attr = $xmlItem->appendChild($dom->createElement($key)); 
                $attr->appendChild($dom->createTextNode($value));
            }
        }
        $dom->formatOutput = true; 
        $xml = $dom->saveXML();
        $dom->save($filename);
        return true;
    } catch (Exception $e) {
    	return false;
    }
}

?>