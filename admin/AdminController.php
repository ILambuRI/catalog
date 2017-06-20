<?php
class AdminController
{
    use ClearDataTrait;
    
    private $fc;
    private $model;
    private $bookid;
    
    public function __construct()
    {
        /* Инициализация объекта фронт-контроллера в Singleton */
        $this->fc = FrontController::getInstance();
        /* Инициализация модели */
        $this->model = new AdminModel();
        /* ID книги */
        $this->bookid = $this->fc->getParams();
    }
    
    public function booksAction()
    {
        /* Все книги */
        $view = $this->model->render('admin_books_view.php');
        $this->fc->setBody($view);
    }
    
    public function addBookAction()
    {
        /* Добавление в базу книги через форму */
        if ('POST' == $_SERVER['REQUEST_METHOD'])
        {
            $book = [];
            try
            {
                $book['name'] = $this->clearData($_POST['name']);
                if(!$book['category'] = implode(',', $_POST['category']))
                    throw new Exception('Нужно выбрать категорию!');
                if(!$book['author'] = implode(',', $_POST['author']))
                    throw new Exception('Нужно выбрать автора!');
                $book['pubyear'] = $this->clearData($_POST['pubyear'], 'int');
                $book['price'] = $this->clearData($_POST['price'], 'int');
                $book['shortdesc'] = $this->clearData($_POST['shortdesc']);
                $book['fulldesc'] = $this->clearData($_POST['fulldesc']);
                
                $this->model->addBook($book);
                
            }
            catch (Exception $e)
            {
                $this->model->error = $e->getMessage();
            }
        }

        $view = $this->model->render('admin_addbook_view.php');
        $this->fc->setBody($view);
    }

    public function changeBookAction()
    {
        /* Редактирование книги через форму */
        if ('POST' == $_SERVER['REQUEST_METHOD'])
        {
            $book = [];
            try
            {
                $this->model->bookid = $this->bookid['id'];
                
                $book['name'] = $this->clearData($_POST['name']);
                if(!$book['category'] = implode(',', $_POST['category']))
                    throw new Exception('Нужно выбрать категорию!');
                if(!$book['author'] = implode(',', $_POST['author']))
                    throw new Exception('Нужно выбрать автора!');
                $book['pubyear'] = $this->clearData($_POST['pubyear'], 'int');
                $book['price'] = $this->clearData($_POST['price'], 'int');
                $book['shortdesc'] = $this->clearData($_POST['shortdesc']);
                $book['fulldesc'] = $this->clearData($_POST['fulldesc']);
                
                $this->model->changeBook($book, $this->bookid['id']);
                
                $this->model->bookArr();
            }
            catch (Exception $e)
            {
                $this->model->error = $e->getMessage();
            }
        }
        else
        {
            $this->model->bookid = $this->bookid['id'];
            $this->model->bookArr();
        }

        $view = $this->model->render('admin_changebook_view.php');
        $this->fc->setBody($view);
    }
}
