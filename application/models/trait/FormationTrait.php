<?php
trait FormationTrait
{
    use HtmlHelperTrait;
    
    public function listFormation($tab_name, $href)
    {
        $res = $this->CreateList($this->db->$tab_name, $href);
        echo $res;
    }
    
    public function checkboxFormation($tab_name, $cheked = 'false')
    {
        $res = $this->CreateCheckbox($this->db->$tab_name, $tab_name, $cheked);
        echo $res;
    }
    
    public function nameFormation($string, $tab_name)
    {
        $name = $this->db->getById($string, $tab_name);
        $result = '';
        foreach($name as $v)
        {
            $result .= '<li>' . $v . '</li>';
        }
        return $result;
    }
        
    public function tabFormation($arr, $admin = 'false')
    {
        foreach ($arr as $key => $book)
        {
            $arr[$key]['authors'] = $this->nameFormation($book["author"], 'author');
            $arr[$key]['categories'] = $this->nameFormation($book["category"], 'category');
        }
        
        if('admin' === $admin)
        $res = $this->CreateAdminTable($arr);
        else        
        $res = $this->CreateTable($arr);
        
        echo $res;
    }
}