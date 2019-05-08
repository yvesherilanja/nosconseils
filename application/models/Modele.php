<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Modele extends CI_Model
{
    
    public function tableDetail($table)
	{
		$sql = "DESCRIBE %s" ;
        $sql = sprintf($sql,$table);
        $resultat = $this->db->query($sql);
		$ret = $resultat->result_array();
		return $ret;
	}
	
	public function table()
	{
		$sql = "SHOW TABLES" ;
		$resultat = $this->db->query($sql);
		$ret = $resultat->result_array();
		return $ret;
	}
	
	public function findAllBetween($table, $initial, $limit)
	{
		$sql = "SELECT * FROM %s LIMIT %d,%d" ;
		$sql = sprintf($sql,$table,$initial,$limit);
		$resultat = $this->db->query($sql);
		$ret = $resultat->result_array();
		return $ret;
	}
	
	public function findAll($table)
	{
		$sql = "SELECT * FROM %s" ;
        $sql = sprintf($sql,$table);
        $resultat = $this->db->query($sql);             
		$ret = $resultat->result_array();
		return $ret;
	}
	
	public function find($table,$dataArray)
	{
		$column = $this->tableDetail($table);
		$sql = "SELECT * FROM %s" ;
		$sql = sprintf($sql,$table);
		
		$length = 0;
		foreach($column as $columns)
		{
			$length++;
		}
		$i=0; $prim = 0;
		foreach($column as $columns)
		{
			if(!isset($dataArray[$i]) || $dataArray[$i]==""){
				$i++;
				continue;
			}

			if($prim==0) {
				$sql = $sql." WHERE ";
				$prim=1;
			}
			$sql = $sql.$columns['Field']."=";
			if(strpos($columns['Type'],"char")==true || strpos($columns['Type'],"ate")==true) $sql = $sql."'".$dataArray[$i]."'";
			else { $sql = $sql."".$dataArray[$i];	}
			if(isset($dataArray[$i+1]) && $dataArray[$i+1]!="") $sql = $sql." and ";
			$i++;
		}
		
        $resultat = $this->db->query($sql);             
		$ret = $resultat->result_array();
		return $ret;
	}

	public function findById($table,$colonneId,$id)
	{
		$sql = "
			SELECT * FROM %s WHERE %s='%s';
			";
		$sql = sprintf($sql,$table,$colonneId,$id);
		$resultat = $this->db->query($sql);
		$donnee = $resultat->row_array();
		return $donnee;
	}
	
	public function supprimer($table,$coloneId,$id)
	{
		$sql = " DELETE FROM %s WHERE %s='%s' ; ";
		$sql = sprintf($sql,$table,$coloneId,$id);
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	public function modifier($table, $colonne, $valeur, $colonneId, $id) //mbola tsisy condition pour type number
	{
		$sql = " update %s set %s='%s' where %s='%s';";
		$sql = sprintf($sql,$table,$colonne,$valeur,$colonneId,$id);
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function miseAjour($table, $dataArray)
	{
		$column = $this->tableDetail($table);
		$sql = " update ".$table." set ";
		$length = 0;
		foreach($column as $columns)
		{
			$length++;
		}
		$i=0;
		foreach($column as $columns)
		{
			if(strpos($columns['Type'],"char")==true || strpos($columns['Type'],"ate")==true || strpos($columns['Type'],"lob")==true) $sql = $sql."".$columns['Field']."='".$dataArray[$i]."'";
			else { $sql = $sql."".$columns['Field']."=".$dataArray[$i];	}
			if($i+1!=$length) $sql = $sql.",";
			$i++;
		}
		$sql = $sql." where ".$column[0]['Field']."='".$dataArray[0]."'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	public function ajouter($table, $dataArray)
	{
		$column = $this->tableDetail($table);
		$sql = " INSERT INTO %s";
		$sql = sprintf($sql,$table);
		$sql = $sql." VALUES(";
		$length = 0;
		foreach($column as $columns)
		{
			$length++;
		}
		$i=0;
		foreach($column as $columns)
		{
			if(strpos($columns['Type'],"char")==true || strpos($columns['Type'],"ate")==true) $sql = $sql."'".$dataArray[$i]."'";
			else { $sql = $sql."".$dataArray[$i];	}
			if($i+1!=$length) $sql = $sql.",";
			$i++;
		}
        $sql = $sql.")";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	public function size($table)
	{
		$sql = " SELECT count(*) FROM %s; ";
		$sql = sprintf($sql,$table);
		$resultat = $this->db->query($sql);
		$donnee = $resultat->row_array();
		return $donnee;
		
	}
	
	public function getDateNow()
	{
		$sq = "SELECT CURRENT_DATE();";
		$resultat = $this->db->query($sql);
		$donnee = $resultat->row_array();
		return $donnee['CURRENT_DATE()'];
	}
}