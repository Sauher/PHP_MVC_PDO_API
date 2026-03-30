<?php

    require_once (__DIR__ . '/../models/User.php');

class UserController
{
 
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $users = $this->userModel->all();
        // Load view and pass users
    }

    public function show($id)
    {
        $user = $this->userModel->find($id);
        // Load view and pass user
    }

    public function create()
    {
        // Load view for creating user
    }

    public function store()
    {
        // Validate and store new user
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        // Load view and pass user
    }

    public function update($id)
    {
        // Validate and update user
    }

    public function delete($id)
    {
        $user = $this->userModel->delete($id);

    }

    public function destroy($id)
    {
        $this->userModel->destroy($id);
        // Redirect or load view
    }

}
