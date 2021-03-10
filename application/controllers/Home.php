<?PHP
class Home extends CI_Controller {
    public function __construct() {

        parent::__construct();
        $this->load->model('posts_model');

    }
    public function index() {

        $data = array(
            'title' => 'Home'
        );

        $data['posts'] = $this->posts_model->getPosts();

        //Verificação da imagem
        for($c = 0; $c<count($data['posts']); $c++){
            //verifica se é uma url (validada no cadastro), se não for usa a imagem padrão
            if(!(strpos($data['posts'][$c]['img_url'], 'http') === 0)) {
               $data['posts'][$c]['img_url'] = base_url().'assets/images/notfound.jpg';
            }
        }

        $this->load->view('template/header', $data);
        $this->load->view('home', $data);
        $this->load->view('template/footer');

    }
}