<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    
    public function indexAction()
    {
       
    }
    public function loginAction()
    {
      //  print_r( $this->request->getPost());

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

        // if($success == [])
        // {
        //     echo $checklogin;
        // }

    //   die();




       
        if ($success) {

            if($success->role == 'user')
            {
                if($success->status == 'restricted')
                {
                    $this->response->redirect('/login/index');
                }
                else if($success->status == 'approved') 
                {
               
                $this->session->set('auth', array(
                    'email' => $email,
                    'password'  => $password,
                    'id' => $success->id,                    
                ));
                 
               
                $this->response->redirect('/dashboard');

                }
              
          
            }
            else if($success->role == 'admin')
            {
                $this->session->set('auth', array(
                    'email' => $email,
                    'password'  => $password,
                    'id' => $success->id,                    
                ));
               $this->response->redirect('/admin');
            }
            else
            {
                $this->view->checklogin = "true";
            }


          
        }
        elseif($success == []){
           echo "username and password do not match please enter valid combination";
        echo "<br>";
            echo $this->tag->linkTo('login', 'back to Login page');
        }

       
    }
}