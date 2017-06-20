<?php
trait ClearDataTrait
{
    /* Проверка и очистка данных */
    function clearData($data, $type = 'str', $empty = 'false')
    {
        switch ($type):
            case 'str': $data = strip_tags(trim($data));
            break;
            case 'int': $data = abs((int)$data);
            break;
        endswitch;
        
        if('false' == $empty)
        {
            if(!$data)
            {
                throw new Exception('Заполните все поля формы!');
            }
        }
        
        return $data;
        
    }
}