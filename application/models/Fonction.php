<?php
if(!defined( 'BASEPATH')) exit('No direct script access allowed');

class Fonction extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findCategorie()
    {
        $sql = "SELECT * FROM categorie";
        $result = $this->db->query($sql);
        $ret = $result->result_array();
        return $ret;
    }
    public function findCategorieById($idcat)
    {
        $sql = "SELECT * FROM categorie WHERE id=%s";
        $sql =sprintf($sql,$idcat);
        $result = $this->db->query($sql);
        $ret = $result->result_array();
        $response = null;
        if($ret!=null) $response= $ret[0];
        return $response;
    }

    public function findArticleById($idart)
    {
        $sql = "SELECT * FROM article WHERE id=%s";
        $sql =sprintf($sql,$idart);
        $result = $this->db->query($sql);
        $ret = $result->result_array();
        $response = null;
        if($ret!=null) $response= $ret[0];
        return $response;
    }

    public function findArticleByIdCat($idcat)
    {
        $sql = "SELECT * FROM article WHERE idcategorie=%s";
        $sql =sprintf($sql,$idcat);
        $result = $this->db->query($sql);
        $ret = $result->result_array();
        return $ret;
    }

    public function findAllArticle()
    {
        $sql = "SELECT * FROM article ";
        $result = $this->db->query($sql);
        $ret = $result->result_array();
        return $ret;
    }

    public function findUser($pseudo,$mdp)
    {
        $sql = "SELECT * FROM users WHERE pseudo='%s' AND mdp='%s'";
        $sql =sprintf($sql,$pseudo,$mdp);
        $result = $this->db->query($sql);
        $ret = $result->result_array();
        $response = null;
        if($ret!=null) $response= $ret[0];
        return $response;
    }

}