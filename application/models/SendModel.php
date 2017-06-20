<?php
class SendModel
{
    use RenderTrait;
    
    private $db; 
    /* Данные для рендера */
    private $book_name;
    private $address;
    private $user;
    private $cnt;
    
    public $error;
    
    
    public function __construct()
    {
        $this->db = DbModel::getInstance();
    }
    
    public function mailAdmin($id, $address, $user, $cnt)
    {
        
        $name = $this->db->getById($id, 'catalog');
        $this->book_name = $name[$id];
        $this->address = $address;
        $this->user = $user;
        $this->cnt = $cnt;
        
        /* Данные для письма */
        $dt = date("d-m-Y H:i:s");
        $to = ADMIN_EMAIL;
        $sub = "Order from $user on $dt";
        $txt = "I need $cnt book(s) $name[$id] with ID - $id on my address: $address";
        $header = "From: catalog@order.com";

        mail($to,$sub,$txt,$header);
    }
    
}
