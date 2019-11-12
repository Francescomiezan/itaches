<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_tables extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->db->query('create table if not exists departements(
            id_departement int primary key auto_increment,
            nom varchar(255) not null,
            description text
        )   ');

        $this->db->query('create table if not exists personnels (
            id_personnel int primary key auto_increment,
            matricule int not null,
            nom varchar(255) not null,
            prenom varchar(255),
            username varchar(255),
            password varchar(255),
            contact varchar(255),
            poste varchar(255),
            mail varchar(255),
            categorie int default 0,
            departement_id int null references departements(id_departement)
        )   ');

        $this->db->query('create table if not exists taches(
            id_tache int primary key auto_increment,
            nom varchar(255) not null,
            description text null,
            createAt timestamp default current_timestamp ,
            notifie int default 0,
            status int default -1,
            departement_id int references departemens(id_departement),
            personnel_id int references personnels(id_personnel),
            ordonneur_id int references personnels(id_personnel)
        )');
    }

    public function down()
    {
        $this->dbforge->drop_table('departements');
        $this->dbforge->drop_table('personnels');
        $this->dbforge->drop_table('taches');
    }

}

/* End of file .php */
