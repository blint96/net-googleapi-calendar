<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
	// Podstawa ładowania widoku
	private function cview($body, $layout = true, $title = false, $data = false)
	{
		$data['title'] = $title;
		if ($this->session->userdata('user_id') > 0)
			$data['logged'] = true;
		else
			$data['logged'] = false;

		if($layout == true)
		{
			$this->load->view("skin/header", $data);
			$this->load->view($body, $data);
			$this->load->view("skin/footer", $data);
		}
		else
		{
			$this->load->view($body, $data);
		}
	}

	// Czy zalogowany
	private function logged()
	{
		$logged = $this->session->userdata('user_id');
		if ($logged > 0)
			return true;
		else
			return false;
	}

	public function index()
	{
		$this->cview('welcome_message');
	}

	public function logout()
	{
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect('/index/', 'refresh');
	}

	// Logowanie
	public function login($info = false)
	{
		if($this->logged())
			return $this->user();

		if(!empty($info))
		{
			$data['error'] = $info;
		}

		if ( $_POST )
		{
			$email = $this->input->post('ipt_email');
			$pass = $this->input->post('ipt_pass');

			if (!$this->Users->is_user_like_this($email))
			{
				$data['error'] = "Takie konto nie istnieje!";
			}

			$receive = $this->Users->log_user($email, $pass);
			if (!$receive)
			{
				$data['error'] = "Wprowadziłeś błędne hasło!";
			}
			else
			{
				$this->load->helper('url');
				$new_data = array("user_id" => $receive["user_id"]);
				$this->session->set_userdata($new_data);
				redirect('/user/', 'refresh');
			}
		}

		if(!empty($data))
			$this->cview('login', true, "Logowanie", $data);
		else
			$this->cview('login', true, "Logowanie");
	}

	// Rejestracja
	public function register()
	{
		if($this->logged())
			return $this->user();

		if ( $_POST )
		{
			$email = $this->input->post('ipt_email');
			$pass = $this->input->post('ipt_pass');

			if ($this->Users->is_user_like_this($email))
			{
				$data['error'] = "Istnieje już konto o takim e-mailu!";
			}
			else
			{
				$data['success'] = "Konto zostało utworzone! Przejdź do logowania <b><a href='/".$this->router->fetch_class()."/login'>tutaj</a></b>.";
				$_POST = array();
				$this->Users->add_user($email, $pass);
			}
		}

		if(!empty($data))
			$this->cview('register', true, "Rejestracja", $data);
		else
			$this->cview('register', true, "Rejestracja");
	}

	// Okno po zalogowaniu
	public function user()
	{
		if(!$this->logged())
			return $this->login();

		// Pokaż interfejs usera
		$this->index();
	}

	public function calendar7()
	{
		// Przerobić to potem
		$this->cview('skin/header', false, "Kalendarz");
		$this->cview('calendar7', false, false);
	}

	public function calendar()
	{
		if (!$this->logged())
		{
			return $this->login('Musisz się zalogować by zobaczyć tę sekcję!');
		}

		// Google API
		$this->load->library('googleapi');
		$client = $this->googleapi->getClient();
		$service = $this->googleapi->createService($client);

		// Code
		$code = $this->input->get('code');
		$test = $this->googleapi->getTestFromPrimary($service);

		$testArray = array();

		if (count($test->getItems()) == 0) 
		{
		 // print "debug false.\n";
		} else {
		  foreach ($test->getItems() as $event) {
		    $start = $event->start->dateTime;
		    if (empty($start)) {
		      $start = $event->start->date;
		    }
		    array_push($testArray, array("describe" => $event->getSummary(), "start" => $start));
		  }
		}

		$data['events'] = $testArray;
		$this->cview('skin/header', false, "Kalendarz");
		$this->cview('calendar', false, false, $data);
	}
}
