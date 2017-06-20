<?php
class BookController 
{
    private $fc;
    private $model;
    private $book;
    
    public function __construct()
    {
        /* Инициализация объекта фронт-контроллера в Singleton */
        $this->fc = FrontController::getInstance();
        /* ID книги */
        $this->book = $this->fc->getParams();
        /* Инициализация модели */
        $this->model = new BookModel();
    }
    
    public function infoAction() 
    {
        $this->model->getBook($this->book['id']);
        
        $view = $this->model->render('book_view.php');
        $this->fc->setBody($view);
    }
}