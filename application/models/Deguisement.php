<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Deguisement extends CI_Model
{
	private $id;
	private $nom;
	private $prix;
	private $oldPrix;
	private $sexe;
	private $taille;
	private $image;
	private $idDescription;
	private $idCategorie;
	private $dateAjout;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modele');
	}

	public function constructor($id,$nom,$prix,$oldPrix,$sexe,$taille,$image,$idDescription,$idCategorie,$dateAjout)
	{
		$this->setId($id);
		$this->setNom($nom);
		$this->setPrix($prix);
		$this->setOldPrix($oldPrix);
		$this->setSexe($sexe);
		$this->setTaille($taille);
		$this->setImage($image);
		$this->setIdDescription($idDescription);
		$this->setIdCategorie($idCategorie);
		$this->setDateAjout($dateAjout);
	}

	public function insert()
	{
        $dataArray = array($this->id,$this->nom,$this->prix,$this->oldPrix,$this->sexe,$this->taille,$this->image,$this->idDescription,$this->idCategorie,$this->dateAjout);
		$maj = $this->Modele->ajouter("Deguisement", $dataArray);
		return $maj;
	}
	public function update()
	{
        $dataArray = array($this->id,$this->nom,$this->prix,$this->oldPrix,$this->sexe,$this->taille,$this->image,$this->idDescription,$this->idCategorie,$this->dateAjout);
		$maj = $this->Modele->miseAjour("Deguisement", $dataArray);
		return $maj;
	}
	public function drop()
	{
		$maj = $this->Modele->supprimer("Deguisement", "id", $this->id);
		return $maj;
	}

	public function findId($id)
	{
		$ret = $this->Modele->findById("Deguisement", "id", $id);
		return $ret;
	}
	public function findAll()
	{
        $ret = $this->Modele->findAll("Deguisement");
        return $ret;
	}
	public function findPart($ini)
	{
		$ret = $this->Modele->findAllBetween("Deguisement", $ini, 10);
		return $ret;
	}

	// RECHERCHE
	public function find()
	{
		$dataArray = array($this->id,$this->nom,$this->prix,$this->oldPrix,$this->sexe,$this->taille,$this->image,$this->idDescription,$this->idCategorie,$this->dateAjout);
		$ret = $this->Modele->find("Deguisement", $dataArray);
		return $ret;
	}

	// DEGUISEMENT IHANY
	public function recent()
	{
		$sql = "SELECT * FROM Deguisement order by dateajout limit 4" ;
        $resultat = $this->db->query($sql);
		$ret = $resultat->result_array();
		return $ret;
	}

	public function search($min, $max, $sexe)
	{
		if($this->id==null || $this->id=="") $this->id="%";
		if($this->nom==null || $this->nom=="") $this->nom="%";
		if($this->taille==null || $this->taille=="toutes") $this->taille="%";
		if($this->idCategorie==null || $this->idCategorie=="toutes") $this->idCategorie="%";
		if($min==null || $min=="")
		{
			$min = 0;
		}
		if($max==null || $max=="")
		{
			$max = 100000;
		}

		$sql = "SELECT * FROM Deguisement where nom like '%".$this->nom."%' and sexe like '".$sexe."' and taille like '".$this->taille."' and idCategorie like '".$this->idCategorie."' and prix between ".$min." and ".$max;

		$resultat = $this->db->query($sql);             
		$ret = $resultat->result_array();
		return $ret;
	}

	public function getDescription($id){
		$this->load->model('Description');
		$desc = new Description();
		return $desc->findId($id);
	}

	public function getImages($id){
		$sql = "SELECT * FROM image Where idDeguisement=%s" ;
        $sql = sprintf($sql,$id);
        $resultat = $this->db->query($sql);
		$ret = $resultat->result_array();
		return $ret;
	}

	public function getId(){
        return $this->id;
	}
	public function getNom(){
		return $this->nom;
	}
	public function getPrix(){
		return $this->prix;
	}
	public function getOldPrix(){
		return $this->oldPrix;
	}
	public function getSexe(){
		return $this->sexe;
	}
	public function getTaille(){
		return $this->taille;
	}
	public function getImage(){
		return $this->image;
	}
	public function getIdDescription(){
		return $this->idDescription;
	}
	public function getIdCategorie(){
		return $this->idCategorie;
	}
	public function getDateAjout(){
		return $this->dateAjout;
	}

	public function setId($new){
        $this->id = $new;
	}
	public function setNom($new){
		$this->nom = $new;
	}
	public function setPrix($new){
		$this->prix = $new;
	}
	public function setOldPrix($new){
		$this->oldPrix = $new;
	}
	public function setSexe($new){
		$this->sexe = $new;
	}
	public function setTaille($new){
		$this->taille = $new;
	}
	public function setImage($new){
		$this->image = $new;
	}
	public function setIdDescription($new){
		$this->idDescription = $new;
	}
	public function setIdCategorie($new){
		$this->idCategorie = $new;
	}
	public function setDateAjout($new){
		$this->dateAjout = $new;
	}
}