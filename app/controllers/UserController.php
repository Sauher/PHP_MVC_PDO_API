<?php

    require_once (__DIR__ . '/../models/User.php');
    require_once (__DIR__ . '/BaseController.php');

class UserController extends BaseController
{
 
    private $userModel;
    private $redirectPath = '/2026/PHP_MVC_PDO_API/public/users';

    public function __construct()
    {
        $this->userModel = new User();
    }

    

    public function index()
    {
        $users = $this->userModel->all();
       $this->render('users', 'index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = $this->userModel->find($id);
        // Load view and pass user
    }

    public function create()
    {
        // Load view for creating user
        $this->render('users', 'create');
    }

    public function store()
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => sha1($_POST['password'])
        ];
        $this->userModel->create($data);
        $this->redirect($this->redirectPath);
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        $this->render('users', 'edit', ['user' => $user]);
    }

    public function update($id)
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ];
        $this->userModel->update($id, $data);
        $this->redirect($this->redirectPath);
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);
        $this->render('users', 'delete', ['user' => $user]);
    }

    public function destroy($id)
    {
        $this->userModel->destroy($id);
        $this->redirect($this->redirectPath);
    }

}
