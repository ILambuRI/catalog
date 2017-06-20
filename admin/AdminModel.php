<?php
class AdminModel
{
    use RenderTrait;
    use FormationTrait;
         
    private $db;
    private $fc;
    /* Данные для рендера */
    private $info;
    private $bookres;
    
    public $bookid;
    public $error;
    
    public function __construct()
    {
        $this->db = DbModel::getInstance();
    }
    /* Принимаем массив книги и записываем в базу */    
    public function addBook($book)
    {
        $sql = "INSERT INTO catalog (name, author, category, pubyear, price, shortdesc, fulldesc)
                VALUES ('" . $book['name'] . "',
                        '" . $book['author'] . "',
                        '" . $book['category'] . "',
                        " . $book['pubyear'] . ",
                        " . $book['price'] . ",
                        '" . $book['shortdesc'] . "',
                        '" . $book['fulldesc'] . "')";
            
        if(!$res = $this->db->insert($sql))
            throw new Exception('Запись в базу не была произведена!');
        else
            $this->info = 'Книга была внесена в базу';
    }
    /* Принимаем массив книги и перезаписываем данные в базе по ID */
    public function changeBook($book, $bookid)
    {        
        $sql = "UPDATE catalog SET name = '" . $book['name'] . "',
                                   author = '" . $book['author'] . "',
                                   category = '" . $book['category'] . "',
                                   pubyear = " . $book['pubyear'] . ",
                                   price = " . $book['price'] . ",
                                   shortdesc = '" . $book['shortdesc'] . "',
                                   fulldesc = '" . $book['fulldesc'] . "'
                                   WHERE id = " . $bookid;
        
        if(!$res = $this->db->insert($sql))
            throw new Exception('Запись в базу не была произведена!');
        else
            $this->info = 'Книга была изменена в базе';
    }
    /* Массив из БД для заполнения формы */
    public function bookArr()
    {
        $this->bookres = $this->db->getByIdField($this->bookid, 'catalog');
    }
}
    




    /*
    public function sqlBuild($arr)
    {
        if(is_array($arr))
        {
            $arr = array_filter($arr);
            $last = end($arr);
            $string = '';
            foreach ($arr as $k=>$v)
            {
                if($last != $v)
                {
                    if('pubyear' == $k or 'price' == $k)
                    {
                        $string .= $k . " = " . $v . ",";
                    }
                    else
                    {
                        $string .= $k . " = '" . $v . "',";
                    }
                }
                else
                {
                    if('pubyear' == $k or 'price' == $k)
                    {
                        $string .= $k . " = " . $v;
                    }
                    else
                    {
                        $string .= $k . " = '" . $v . "'";
                    }
                }
            }
            
            return $string;
        }
        else
        {
            throw new Exception('Ошибка в запросе!');
        }
    }
    */
