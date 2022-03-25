<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
       
    }
    public function loginAction()
    {
        print_r( $this->request->getPost());

        if ($this->request->isPost()) {
            $password = $this->request->getPost("password");
            $email = $this->request->getPost("email");
        }
      

        $success = Users::findFirst(array(
            'email = :email: and password = :password:', 'bind' => array(
                'email' => $this->request->getPost("email"),
                'password' => $this->request->getPost("password")
            )
        ));
       
        if ($success) {
            echo "successful login";
            $this->session->set('email', $email);
            $this->session->set('password', $password);
           $this->response->redirect('/dashboard');
        }

       
    }
}