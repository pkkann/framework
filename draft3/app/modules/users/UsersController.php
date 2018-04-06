<?php
class UsersController extends BaseController {
	
	public function index() {
		$users = $this->model->getAll();
		echo $this->plates->render("views::index", ['users' => $users]);
	}
	
	public function get($id) {
		$this->loadHelper("api");
		$user = $this->model->get($id);
		$this->api->outputJSON($user);
	}

	public function getAll() {
		sleep(2);
		$this->loadHelper("api");
		$users = $this->model->getAll();
		$data = array(
			"data" => $users
		);
		$this->api->outputJSON($data);
	}
	
	public function create() {
		$this->loadHelper("api");
		$data = $_POST;
		
		$name = trim($_POST['name']);
		$username = trim($_POST['username']);
		$password = $_POST['password'];
		
		$this->model->create($name, $username, $password);
	}
	
	public function save() {
		$this->loadHelper("api");
		$data = $_POST;
		
		$id = $_POST['id'];
		$name = trim($_POST['name']);
		
		$this->model->update($id, $name);
	}
}