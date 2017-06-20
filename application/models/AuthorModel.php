<?php
class AuthorModel
{
    use RenderTrait;
    use FormationTrait;

    private $db;
    /* Данные для рендера */
    private $author_arr;
    private $author;
    
    
    public function __construct()
    {
        $this->db = DbModel::getInstance();
    }
    
    public function getAuthor($id)
    {
        $sql = "SELECT * FROM `catalog` WHERE `author` LIKE '%$id%'";
        $this->author_arr = $this->db->execute($sql);
        
        $name = $this->db->getById($id, 'author');
        $this->author = $name[$id];
    }
}
