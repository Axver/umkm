<?php

class LoginUser_menu extends CI_Controller
{
    public function listuser()
    {
        $user=$this->dashboard_model->getUserList();
    }
    
}