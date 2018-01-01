<?php
class LoginController extends BaseController {

    public function __construct(League\Plates\Engine $plates) {
        parent::__construct($plates);
        $this->loadHelper("url");
        $this->loadHelper("db");
        $this->loadHelper("api");
    }
    
    public function index() {
        if(isset($_SESSION['user'])) {
            $this->url->redirect("dashboard", "index");
        }
        echo $this->plates->render('views::index');
    }

    public function authenticate() {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        $stmt = $this->db->pdo()->prepare("SELECT `id`, `name`, `username`, `password` FROM `user` WHERE `username` = :username");
        $stmt->bindParam(":username", $username);
        if(!$stmt->execute() || $stmt->rowCount() == 0) {
            $this->api->outputJSON(['error' => "Brugernavn eller adgangskode er forkert"]);
        }

        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if(password_verify($password, $user->password)) {
            $_SESSION['user'] = (object)[
                "id" => $user->id,
                "username" => $user->username,
                "name" => $user->name
            ];
        } else {
            $this->api->outputJSON(['error' => "Brugernavn eller adgangskode er forkert"]);
        }
    }

    public function deauthenticate() {
        session_destroy();
        session_start();
        $this->url->redirect("login", "index");
    }

}