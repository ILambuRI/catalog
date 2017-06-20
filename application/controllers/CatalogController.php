<?php
class CatalogController 
{
    private $fc;
    private $model;
    
    public function __construct()
    {
        /* Инициализация объекта фронт-контроллера в Singleton */
        $this->fc = FrontController::getInstance();
        /* Инициализация модели */
        $this->model = new CatalogModel();
    }
    
    public function booksAction() 
    {
        /* Все книги */
        $view = $this->model->render('cat_books_view.php');
        $this->fc->setBody($view);
    }
    
}
