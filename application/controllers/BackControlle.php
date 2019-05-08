<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Deguisement');
		$this->load->model('Modele');

		$ini = 0;
		if($this->input->get('next')!=null) 
		{
			$ini+=10;
		}
		if($this->input->get('prev')!=null) 
		{
			$ini-=10;
		}

		$deguise = new Deguisement();
		$don = $deguise->findPart($ini);
	
		$lt = $this->Modele->table();
		$col = $this->Modele->tableDetail("Deguisement");

		$table = "Deguisement";

		$send = array('listeTable'=>$lt,
						'column'=>$col,
						'liste'=>$don,
						'table'=>$table,
						'ini'=>$ini
		);
		$this->load->view('index',$send);
	}

	public function delete()
	{
		$this->load->model('Deguisement');
		$deguise = new Deguisement();
		$deguise->setId($this->input->get('id'));
		$deguise->drop();
		
		$this->load->model('Modele');

		$ini = 0;
		if($this->input->get('next')!=null) 
		{
			$ini+=10;
		}
		if($this->input->get('prev')!=null) 
		{
			$ini-=10;
		}

		$deguise = new Deguisement();
		$don = $deguise->findPart($ini);
	
		$lt = $this->Modele->table();
		$col = $this->Modele->tableDetail("Deguisement");

		$table = "Deguisement";

		$send = array('listeTable'=>$lt,
						'column'=>$col,
						'liste'=>$don,
						'table'=>$table,
						'ini'=>$ini
		);
		$this->load->view('index',$send);
	}

	public function update()
	{
		$table = "Deguisement";
		$this->load->model('Modele');
		$col = $this->Modele->tableDetail($table);
		foreach($col as $columns)
		{
			$this->Modele->modifier($table, $columns['Field'], $this->input->get($columns['Field']), "id", $this->input->get("id"));
		}
		$table = "Deguisement";
		$id=$this->input->get('id');
		$this->load->model('Deguisement');
		$deguise = new Deguisement();
		$prod = $deguise->findId($id);

		$send = array('column'=>$col,
						'prod'=>$prod,
						'table'=>$table,
						'id'=>$id
		);
		$this->load->view('maj',$send);
	}

	public function pageUpdate()
	{
		$this->load->model('Modele');
		$col = $this->Modele->tableDetail("Deguisement");
		$table = "Deguisement";
		$id=$this->input->get('id');
		$this->load->model('Deguisement');
		$deguise = new Deguisement();
		$prod = $deguise->findId($id);

		$send = array('column'=>$col,
						'prod'=>$prod,
						'table'=>$table,
						'id'=>$id
		);
		$this->load->view('maj',$send);
	}

	public function pageCreate()
	{
		$this->load->model('Modele');
		$table = "Deguisement";
		$col = $this->Modele->tableDetail($table);
		
		$send = array('column'=>$col,
						'table'=>$table
		);
		$this->load->view('create',$send);
	}

	public function create()
	{
		$table = "Deguisement";
		$this->load->model('Modele');
		$col = $this->Modele->tableDetail($table);
		$this->load->model('Deguisement');
		$deguise = new Deguisement();
		$deguise->constructor("x","dc",20.0,20.3,"f","XL","hello","md","cat",null);
		$deguise->insert();
		
		$send = array('column'=>$col,
						'table'=>$table
		);
		$this->load->view('create',$send);
	}
}
