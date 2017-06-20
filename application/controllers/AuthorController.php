<?php
class AuthorController 
{
    private $fc;
    private $model;
    private $author_id;
    
    public function __construct()
    {
        /* Инициализация объекта фронт-контроллера в Singleton */
        $this->fc = FrontController::getInstance();
        /* ID автора */
        $this->author_id = $this->fc->getParams();
        /* Инициализация модели */
        $this->model = new AuthorModel();
    }
    
    public function listAction() 
    {
        $this->model->getAuthor($this->author_id['id']);
        
        $view = $this->model->render('author_books_view.php');
        $this->fc->setBody($view);
    }
    
}