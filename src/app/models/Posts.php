<?php

use Phalcon\Mvc\Model;

class Posts extends Model
{
    public $id;
    public $username;
    public $title;
    public $content;
    public $date;
    public $uid;
}