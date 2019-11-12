<?php


class Admin extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('username', 'Nom d\'utilisateur', 'trim|required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');

        $code = 500;

        if($this->form_validation->run() == TRUE){
            
            //modification du code
            $code = 300;
            $user = $this->personnel->get(array(
                'username'=>$_POST['username'],
                'password'=>$_POST['password'],
            ));


            if($user){
                $code = 200;
                $this->session->set_userdata('user', $user);
                return redirect('security/index');
            }else{
                $code = 204;
            }
        }else{
            $code = 304;
        }

        $contenue_base = $this->load->view('admin/index', compact('code','user'), TRUE);
        $this->load->view('base', compact('contenue_base'));
    }


    
}
