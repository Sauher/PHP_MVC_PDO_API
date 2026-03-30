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
           $url = parse_url($url, PHP_URL_PATH);

           foreach ($this->routes[$method] as $route) {
               if ($route['url'] === $url) {
                   call_user_func($route['action']);
                   return;
               }
           }
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