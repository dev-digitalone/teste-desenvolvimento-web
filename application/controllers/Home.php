<?PHP
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }
    public function index() {
        $data = array(
            'title' => 'Home'
        );
        $this->load->view('template/header', $data);
        $this->load->view('home', $data);
        $this->load->view('template/footer');
    }
}