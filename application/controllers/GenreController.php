<?php
class GenreController 
{
    private $fc;
    private $model;
    private $genre_id;
    
    public function __construct()
    {
        /* Инициализация объекта фронт-контроллера в Singleton */
        $this->fc = FrontController::getInstance();
        /* ID жанра */
        $this->genre_id = $this->fc->getParams();
        /* Инициализация модели */
        $this->model = new GenreModel();
    }
    
    public function listAction() 
    {
        $this->model->getGenre($this->genre_id['id']);
        
        $view = $this->model->render('genre_books_view.php');
        $this->fc->setBody($view);
    }
    
}
