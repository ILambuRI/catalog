<?php
class BookModel
{
    use RenderTrait;
    use FormationTrait;

    private $db;
    /* Данные для рендера */
    private $book;
    
    
    
    public function __construct()
    {
        $this->db = DbModel::getInstance();
    }
    
    public function getBook($id)
    {
        $sql = "SELECT * FROM catalog WHERE id = $id";
        $res = $this->db->execute($sql);
        $this->book = $res[0];
    }
}
