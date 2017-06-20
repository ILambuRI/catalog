<?php
class FrontController 
{
    use SingletonTrait;
    
    /* класс - контроллер */
    protected $_controller;
    /* метод - контроллера */
    protected $_action;
    /* параметры для метода в массиве */
    protected $_params;
    /* готовое представление */
    protected $_body;

    private function __construct()
    {
        $request = $_SERVER['REQUEST_URI'];
        $splits = explode('/', trim($request,'/'));
        /* Какой сontroller */
        $this->_controller = !empty($splits[0]) ? ucfirst($splits[0]).'Controller' : 'CatalogController';
        /* Какой action */
        $this->_action = !empty($splits[1]) ? $splits[1].'Action' : 'booksAction';
        /* Параметры и их значения */
        if(!empty($splits[2]))
        {
            $keys = $values = [];
            for($i=2, $cnt = count($splits); $i<$cnt; $i++)
            {
                if($i % 2 == 0)
                {
                    /* Чётное = ключ (параметр) */
                    $keys[] = $splits[$i];
                }
                else
                {
                    /* Значение параметра */
                    $values[] = $splits[$i];
                }
            }
            $this->_params = array_combine($keys, $values);
        }
    }
    
    /*Роутинг*/
    public function route() 
    {
        $controller = $this->getController();
        $method = $this->getAction();
        $route = new $controller();
        $route->$method();
    }

    public function getParams() 
    {
        return $this->_params;
    }

    public function getController() 
    {
        return $this->_controller;
    }

    public function getAction() 
    {
        return $this->_action;
    }

    public function getBody() 
    {
        return $this->_body;
    }

    public function setBody($body) 
    {
        $this->_body = $body;
    }
    
}	