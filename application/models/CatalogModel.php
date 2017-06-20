<?php
class CatalogModel
{
    use RenderTrait;
    use FormationTrait;
    
    private $db;
    
    public function __construct()
    {
        $this->db = DbModel::getInstance();
    }
}