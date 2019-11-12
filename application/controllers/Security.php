<?php


class Security extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->has_userdata('user')){
            return redirect('admin/index');
        }

        $this->user = $this->session->user;
    }


    public function base()
    {
        $contenue_base = $this->load->view('security/index', [], TRUE);
        $this->load->view('base', compact('contenue_base'));
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        return redirect('admin/index');
    }

    public function index()
    {
        if($this->user['categorie'] == 1){
            $taches = $this->tache->get_all(['departement_id'=>$this->user['departement_id']]);
            $staff = $this->personnel->get_all(['departement_id'=>$this->user['departement_id']]);
        }else if($this->user['categorie'] == 2){
            $taches = $this->tache->get_all(['personnel_id'=>$this->user['id_personnel']]);
            $staff = array();
        }else{
            $taches = $this->tache->get_all();
            $staff = $this->personnel->get_all();
        }

        $contenue_security = $this->load->view('security/taches', compact('taches','staff'), TRUE);
        $contenue_base = $this->load->view('security/index', compact('contenue_security'), TRUE);
        $this->load->view('base', compact('contenue_base'));
    }

    public function tache()
    {
        $departements = $this->departement->get_all();

        $this->form_validation->set_rules('nom', 'Nom de la tache', 'required');
        $this->form_validation->set_rules('description', 'Description de la tache', 'required');
        $code = 500;
        if($this->form_validation->run()){

            $this->tache->insert(array(
                'nom'=>$_POST['nom'],
                'departement_id'=>$_POST['departement'],
                'description'=>$_POST['description'],
                'ordonneur_id'=> $this->session->user['id_personnel']
            ));

            $code = 200;
        }

        $contenue_security = $this->load->view('security/tache', compact('departements','code'), TRUE);
        $contenue_base = $this->load->view('security/index', compact('contenue_security'), TRUE);
        $this->load->view('base', compact('contenue_base'));
    }

    public function personnels()
    {
        $personnels = $this->personnel->get_all();


        $contenue_security = $this->load->view('security/personnels', compact('personnels'), TRUE);
        $contenue_base = $this->load->view('security/index', compact('contenue_security'), TRUE);
        $this->load->view('base', compact('contenue_base'));
    }

    public function personnel($personnel_id = null)
    {
        $code = 500;
        $departements = $this->departement->get_all();

        if($personnel_id){
            $personnel = $this->personnel->get(['id_personnel'=>$personnel_id]);
        }

        $this->form_validation->set_rules('username', 'Nom d\'utilisateur', 'trim|required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');

        if($this->form_validation->run()){

            if(isset($personnel)){
                $this->personnel->modifier($personnel_id ,array(
                    'matricule' => $_POST['matricule'],
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'poste' => $_POST['poste'],
                    'departement_id' => $_POST['departement'],
                    'contact' => $_POST['contact'],
                    'mail' => $_POST['mail'],
                    'categorie' => $_POST['categorie'],
                ));
            }else{
                $this->personnel->insert(array(
                    'matricule' => $_POST['matricule'],
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'password' => $_POST['password'],
                    'username' => $_POST['username'],
                    'poste' => $_POST['poste'],
                    'departement_id' => $_POST['departement'],
                    'contact' => $_POST['contact'],
                    'mail' => $_POST['mail'],
                    'categorie' => $_POST['categorie'],
                ));
            }
            $code = 200;
        }

        $contenue_security = $this->load->view('security/personnel', compact('departements','code','personnel'), TRUE);
        $contenue_base = $this->load->view('security/index', compact('contenue_security'), TRUE);
        $this->load->view('base', compact('contenue_base'));
    }

    public function supprimer($id)
    {
        $this->personnel->supprimer(['id_personnel'=>$id]);
        return redirect('security/personnels');
    }

    public function attribuer_tache($id_tache, $id_personnel)
    {
        $this->tache->modifier($id_tache, array('personnel_id'=>$id_personnel));
        return redirect('security/index');
    }

    public function etapes($id_tache, $etapes)
    {
        $this->tache->modifier($id_tache, array('status'=>$etapes));
        return redirect('security/index');
    }

}