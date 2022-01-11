<?php
class Controller_Main extends Controller {
    function __construct()
    {
        $this->view = new View();
        $this->model = new Model_main();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
}