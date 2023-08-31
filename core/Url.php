<?php 
class Url 
{
    public function getUrl() : Array
    {
        $url = null;
        if (isset($_GET['p'])) {
            $url = $_GET['p'];
            $url = rtrim($url, '/');
            $url = explode('/', $url);
        } else {
            $url = ['home'];
        }

        return $url;
    }

    public function getController() : Array
    {
        $controller = $this->getUrl();
        $controll   = [];
        if (count($controller) === 3) {
            $controll[] = $controller[0];
            $controll[] = $controller[2];
        } elseif (count($controller) == 2) {
            $controll[] = $controller[0];
            $controll[] = $controller[1];
        } else {
            $controll[] = $controller[0];
        }

        return $controll;
    }

    public function getFile()# : String
    {
        $file = $this->getController();
        if (count($file) == 1) {
            $file = $file == ['home'] || $file == ['logout'] ? 'apps/'.$file[0].'.php': 'apps/'.$file[0].'/home.php';
        } else {
            $file = 'apps/'.$file[0].'/'.$file[1].'.php';
        }

        return file_exists($file) ? $file: 'apps/notfound.php';
    }

    public function getParam() : Int
    {
        $param = $this->getUrl();
        
        return count($param) === 3 ? $param[1] : 0;
    }

    public function getTitle() : String
    {
        $title = $this->getController();
        $title = count($title) == 2 ? $title[1].' - '.$title[0]: $title[0];

        return ucfirst($title);
    }
}
