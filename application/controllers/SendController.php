<?php
class SendController 
{
    use ClearDataTrait;
    
    private $fc;
    private $model;
    private $book_id;
        
    public function __construct()
    {
        /* Инициализация объекта фронт-контроллера в Singleton */
        $this->fc = FrontController::getInstance();
        /* ID книги */
        $this->book_id = $this->fc->getParams();
        /* Инициализация модели */
        $this->model = new SendModel();
    }
    
    public function bookAction() 
    {
        /* Данные для письма */
        $id = $this->book_id['id'];

        try
        {
        $address = $this->clearData($_POST['address']);
        $user = $this->clearData($_POST['user']);
        $count = $this->clearData($_POST['count'], 'int');
        
        $this->model->mailAdmin($id, $address, $user, $count);
        }
        catch (Exception $e)
        {
            $this->model->error = $e->getMessage();
        }
        
        $view = $this->model->render('send_book_view.php');
        $this->fc->setBody($view);
    }
}
