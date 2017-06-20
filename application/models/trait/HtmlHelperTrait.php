<?php
trait HtmlHelperTrait
{
    public function CreateList($arr, $href)
    {
        $list = '';
        foreach ($arr as $li)
        {
            
            
            $list .= "<li><a href='" . $href . $li['id'] . "'>" . $li['name'] . "</a></li>";
                        
        }
        
        return $list;
    }
    
    public function CreateCheckbox($arr, $table_name, $cheked)
    {
        if($cheked)
        {
            $arrcheked = explode(',', $cheked);
        }
        
        $list = '';
        
        foreach ($arr as $box)
        {
            $flag = '';
            if($cheked && in_array($box['id'], $arrcheked))
            {
                $flag = 'checked';
            }
            
            $list .= "<input type='checkbox' " . $flag . " name='" . $table_name . "[]' value='" . $box['id'] . "'>" . $box['name'] . "<br>";
        }
        
        return $list;
    }
    
    
    public function CreateTable($arr)
    {
        $table = '';
        
        foreach ($arr as $book)
        {
            $table .= "<tr>
                        <td align='center'>" . $book['name'] . "</td>
                        <td align='center'>" . $book['authors'] . "</td>
                        <td align='center'>" . $book['categories'] . "</td>
                        <td align='center'>" . $book['pubyear'] . "</td>
                        <td align='center'>" . $book['price'] . "</td>
                        <td align='center'>" . $book['shortdesc'] . "</td>
                        <td align='center'><a href='/book/info/id/" . $book['id'] . "'>Подробнее</a></td>
                      </tr>";
        }
        
        return $table;
    }    
    
    public function CreateAdminTable($arr)
    {
        $table = '';
        
        foreach ($arr as $book)
        {
            $table .= "<tr>
                        <td align='center'>" . $book['id'] . "</td>
                        <td align='center'>" . $book['name'] . "</td>
                        <td align='center'>" . $book['authors'] . "</td>
                        <td align='center'>" . $book['categories'] . "</td>
                        <td align='center'>" . $book['pubyear'] . "</td>
                        <td align='center'>" . $book['price'] . "</td>
                        <td align='center'>" . $book['shortdesc'] . "</td>
                        <td align='center'><a href='/admin/changebook/id/" . $book['id'] . "'>Изменить</a></td>
                      </tr>";
        }
        
        return $table;
    }
}