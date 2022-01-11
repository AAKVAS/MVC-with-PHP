<?php
class Controller_about extends Controller {
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_about();
    }

    public function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('about_view.php', 'template_view.php', $data);
    }
}