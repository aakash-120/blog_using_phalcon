<?php

use Phalcon\Mvc\Controller;


class AdminController extends Controller
{
    public function indexAction()
    {
        echo "i am inside admin index page";
      //  print_r(Users::find());
       // $this->view->users = Users::find();
       $table = Users::find();
        $j = json_encode($table);
        $de = json_decode($j, true);
        print_r($de);
        $this->view->users = $de;
       //die();
    }


    public function statusAction()
    {
        echo "inside admin staus ";
        print_r($this->request->getPost());

        $status =  $this->request->getPost('status');
        $id =  $this->request->getPost('id');
        $btn =  $this->request->getPost('btn');

        $row = Users::findFirst(
            [
                "id = '$id'",
            ]
        );

        
        if($btn == 'change')
        {
            if($status == 'restricted')
            {
                $row->status = 'approved';
                $row->save();
            }
            else if($status == 'approved')
            {
                $row->status = 'restricted';
                $row->save();
            }
            
        }
        else if($btn == 'delete'){    
            $row->delete();
           
        }
        $this->response->redirect('/admin');
       // die();
    }


    public function blogAction()
    {
        $table = Posts::find();
        $this->view->d = $table;
    }


    public function addblogAction()
    {
       
    }

    public function addtodbAction()
    {
        print_r($this->request->getPost());
        echo "date  = >";
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y h:i:s');
        //  echo $date;


        $name =  $this->request->getPost('name');
        $title =  $this->request->getPost('title');
        $content =  $this->request->getPost('content');

        $post = new Posts();

        $post->username = $name;
        $post->title = $title;
        $post->content = $content;
        $post->date = $date;
        $post->uid = $this->session->get('auth')['id'];

        $post->save();

        echo " successgul insert ";
        //die();
        $this->response->redirect('/admin');
    }


    public function editAction()
    {
        echo "im inside edit delete";
        print_r($this->request->getPost());
        echo $this->request->getPost('editBlog');
  
        $edit = $this->request->getPost('Edit');
        $id = $this->request->getPost('blogid');
        $readmore = $this->request->getPost('readmore');

        // echo $edit;
        // echo $id;
        // echo $readmore;

        $table = Posts::findFirst(
            [
                "id = '$id'",
            ]
        );
        $this->view->edit_var = $table;
 
    }

    public function deleteAction()
    {
        echo "im inside edit delete";
        print_r($this->request->getPost());

        $did =  $this->request->getPost('blogid');
        echo $did;

        $particular_column = Posts::findFirst(
            [
                "id = '$did'",
            ]
        );

        $particular_column->delete();



        echo " succefully deleted";

        $this->response->redirect('/admin/blog');
    //     if(isset($this->request->getPost('editBlog')))
    //    {
    //     echo $this->request->getPost('Edit');
    //     echo "edity button";
        
    //    }
     //   die();
    }


    public function updateAction()
    {
        print_r($this->request->getPost());
        $id2  = $this->request->getPost('id2');
        $name =  $this->request->getPost('name');
        $title =  $this->request->getPost('title');
        $content =  $this->request->getPost('content');
        $date =  $this->request->getPost('date');


        $particular_column = Posts::findFirst(
            [
                "id = '$id2'",
            ]
        );


        $particular_column->id = $id2;
        $particular_column->username = $name;
        $particular_column->title = $title;
        $particular_column->content = $content;
        $particular_column->date = $date;


        $particular_column->save();


        $this->response->redirect('/admin/blog');
       // die();
    }


    public function adduserAction()
    {
        echo "i am inside add user fucntion";
    }


    public function logoutAction()
    {
        $this->session->destroy('auth');
         $this->response->redirect('/login');
    }



    public function userRegisterAction(){
        $user = new Users();
        print_r( $this->request->getPost());
        $user->assign(
            $this->request->getPost(),
            [
                'name',
                'email',
                'password',            
            ]
        );
        $user->role = 'user';
        $user->status = 'restricted';
        // print_r($user);
        // die();

      
        $success = $user->save();

        $this->view->success = $success;


        $this->response->redirect('/admin');

        // if($success){
        //     $this->view->message = "Register succesfully";
        // }else{
        //     $this->view->message = "Not Register succesfully due to following reason: <br>".implode("<br>", $user->getMessages());
        // }
    }

    

}