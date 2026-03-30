<?php
    class Router{
        private array $routes = [];

        public function get($url, $action){
            $this->addRoute('GET', $url, $action);

        }

        public function post($url, $action){
            $this->addRoute('POST', $url, $action);
        }

        public function patch($url, $action){
            $this->addRoute('PATCH', $url, $action);
        }

        public function delete($url, $action){
            $this->addRoute('DELETE', $url, $action);
        }

        private function addRoute($method, $url, $action)
        {
            $this->routes[$method][] = [
                'url' => $url,
                'action' => $action
            ];
        }

        public function dispatch($method, $url)
        {
           $baseurl = '/2026/PHP_MVC_PDO_API/public';

           $url = str_replace($baseurl, '', $url);

           $url = parse_url($url, PHP_URL_PATH);
           $url = trim($url, '/') ?: '/';

           $routesForMethod = $this->routes[$method] ?? [];
           foreach ( $routesForMethod as $route){
               $routeUrl = trim($route['url'], '/') ?: '/';
               $pattern = preg_replace('#:([\w]+)#', '([^/]+)', $routeUrl);
               $pattern = '#^' . $pattern . '$#';

                if (preg_match($pattern, $url, $matches)){
                    array_shift($matches);
                    $action = $route['action'];
                    if (is_array($action)){
                        $controllerName = $action[0];
                        $methodName = $action[1];
                        $controller = new $controllerName();
                        call_user_func_array([$controller, $methodName], $matches);
                        return;
                    }

                    if(is_callable($action)){
                        call_user_func_array($action, $matches);
                        return;
                    }
                }
           }

           http_response_code(404);

           $viewPath = __DIR__ . '/../app/views/errors/404.php';
           if (is_file($viewPath))
           {
              require $viewPath;
              return;
           }

           echo "404 Not Found";
        }
    }

    /*

    GET /users ----------------> user-ek listázása
    GET /users/create ---------> user létrehozó űrlap
    GET /users/:id ------------> megadott user listázása
    POST /users/store ---------> új user tárolása

    GET /users/edit/:id -------> user módosító űrlap
    PATCH /users/update/:id ---> user frissítése

    GET /users/delete/:id -----> user törlő űrlap
    DELETE /users/destroy/:id -> user törlése
    */
?>