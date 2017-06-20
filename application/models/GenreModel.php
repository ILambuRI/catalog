<?php
class GenreModel
{
    use RenderTrait;
    use FormationTrait;

    private $db;
    /* Данные для рендера */
    private $genre_arr;
    private $genre;
    
    
    public function __construct()
    {
        $this->db = DbModel::getInstance();
    }
    
    public function getGenre($id)
    {
        
        $sql = "SELECT * FROM catalog WHERE category LIKE '%$id%'";
        $this->genre_arr = $this->db->execute($sql);
        
        $name = $this->db->getById($id, 'category');
        $this->genre = $name[$id];
    }
}
