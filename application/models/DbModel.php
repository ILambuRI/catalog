<?php

class DbModel
{

    use SingletonTrait;
    
    /* Массивы таблиц которые необходимы */
    private $tables = ['catalog','author','category'];
    
    protected $dbh;

    protected function __construct()
    {
        $host = HOST_NAME; $db = DB_NAME; $user = USER_NAME; $pass = PASS; $type = TYPE;
        $this->dbh = new PDO("$type:host=$host;dbname=$db", $user, $pass);
        /* Получаем массивы таблиц */       
        foreach ($this->tables as $tab)
        {
        $this->getTable($tab);
        }
    }

    public function getTable($tab_name)
    {
        $sql = "SELECT * FROM $tab_name";
        $this->$tab_name = $this->execute($sql);
    }
    /* Массив с id=>name */
    public function getById($string, $tab_name)
    {
        $ids = explode(',', $string);
        $name_arr = [];
        foreach($ids as $id)
        {
                      
            $sql = "SELECT name FROM $tab_name WHERE id = $id";
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $arr = $sth->fetch(PDO::FETCH_ASSOC);
            $name_arr[$id] = $arr['name'];
            
        }
        return $name_arr;
    }
    /* Поле по id */
    public function getByIdField($id, $tab_name)
    {
        $sql = "SELECT * FROM $tab_name WHERE id = $id";
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $arr = $sth->fetch(PDO::FETCH_ASSOC);

        return $arr;
    }
    /* Вывод данных из БД */
    public function execute($sql)
    {
        try
        {
            $sth = $this->dbh->prepare($sql);
            $sth->execute();
            $arr = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $arr;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
    /* Ввод данных в БД */
    public function insert($sql)
    {
        try
        {
            $res = $this->dbh->exec($sql);
            return $res;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }

}