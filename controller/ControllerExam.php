<?php
require_once 'framework/Controller.php';
require_once 'framework/View.php';
require_once "model/User.php";
require_once "model/Categories.php";

class ControllerExam extends Controller {
    public function index(): void {
        $user = $this->get_user_or_false();
        $users = User::get_all_users();
        $categories = Categories::get_all_categories();

        if (!$user->is_admin() || !$user) {
            $this->redirect("items", "display");
        }

        (new View("exam"))->show(
            [
                "users" => $users,
                "categories" => $categories
            ]
        );

    }

        public function userSelection(): void {
        $user = $this->get_user_or_false();
        $selectedUserId = $_POST['userSelectedIdForm'] ?? 0;

        if (!$user->is_admin() || !$user) {
            $this->redirect("items", "display");
        }

        if ($selectedUserId != 0) {
            $this->redirect("exam", "index", $selectedUserId);
        } else {
            $this->redirect("exam", "index");
        }

    }
}