<?php

use Phalcon\Mvc\Controller;


class DashboardController extends Controller
{
    public function indexAction()
    {     
       //$this->view->table = Posts::find();    
       $table =Posts::find();  
$j = json_encode($table);
$de = json_decode($j, true);
// echo "<pre>";
// print_r($d);
// echo "</pre>";


// echo "------------------------------------------";
// echo count($d);
// $i = 0;
// while(count($d) > $i)
// {
//     echo $d[$i]['username'];
//     echo "<br>";
//     $i++;
// }





 $this->view->d = $de;   
// 
//die();
        
 
    }
}