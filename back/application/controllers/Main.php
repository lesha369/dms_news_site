<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// подключаем общую библиотеку + конфиг
require_once(APPPATH . 'dmconfig.php');

class Main extends CI_Controller {

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
		$this->load->view('header');

		$data['carousel_photos'] = $this->dms->get_carousel_photos();
		$data['upc_events'] = $this->dms->get_upc_events();




		$this->load->view('main_view', $data);
		$this->load->view('footer');
	}
	public function upc_event(){

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

	    $this->load->view('header');


        if ($this->uri->segment(3)){
            $this->load->library('email');
            $id = $this->security->xss_clean($this->uri->segment(3));
            if (is_numeric($id)){
                @$data['data'] = $this->dms->get_upc_event($id)[0];
                $data['id'] = $id;

                $this->form_validation->set_rules('id', 'id', 'required|is_numeric');
                $this->form_validation->set_rules('fio', 'ФИО', 'required|htmlspecialchars', ['required' => 'Ввод %s обязателен']);
                $this->form_validation->set_rules('phone', 'Телефон', 'required|htmlspecialchars', ['required' => 'Ввод %sа обязателен']);
                $this->form_validation->set_rules('company', 'Название компании', 'required|htmlspecialchars', ['required' => 'Ввод %s обязателен']);
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', ['required' => 'Ввод %s обязателен']);
                $this->form_validation->set_rules('other', 'Примечание', 'htmlspecialchars');

                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


                if ($this->form_validation->run() == FALSE)
                {
                    $id = $this->security->xss_clean($this->uri->segment(3));
                    @$data['data'] = $this->dms->get_upc_event($id)[0];
                    if ($data['data']){
                        $this->load->view('upc_event', $data);
                    }

                }
                else
                {
                    $fio = $this->security->xss_clean($this->input->post('fio'));
                    $phone = $this->security->xss_clean($this->input->post('phone'));
                    $company = $this->security->xss_clean($this->input->post('company'));
                    $email = $this->security->xss_clean($this->input->post('email'));
                    $other = $this->security->xss_clean($this->input->post('other'));
                    $name_event = $data['data']['full_name'];
                    $ip = $_SERVER["REMOTE_ADDR"];

                    $message_to_admin = '';
                    $message_to_admin .= "Заявка на мероприятие: $name_event \n";
                    $message_to_admin .= "ID мероприятия: $id \n";
                    $message_to_admin .= "Имя отправителя: $fio\n";
                    $message_to_admin .= "Компания: $company\n";
                    $message_to_admin .= "Телефон отправителя: $phone\n";
                    $message_to_admin .= "E-mail отправителя: $email\n";
                    $message_to_admin .= "Сообщение: $other\n";
                    $message_to_admin .= "ip: $ip\n";
                    //print_r($message_to_admin);

                    $this->dms->send_mail($message_to_admin);

                    $this->load->view('formsuccess_upc_event');
                }

            }
            else{
                echo '';
            }
        }else{
            $this->load->view('upc_event');
        }







	    $this->load->view('footer');
    }

    public function activity(){
        $this->load->view('header');
        $this->load->view('activity_view');
        $this->load->view('footer');
    }

    public function gallery(){
        $this->load->view('header');

        $data['albums'] = $this->dms->get_albums();

        if ($this->uri->segment(3)){
            $album_id = $this->security->xss_clean($this->uri->segment(3));
            if (is_numeric($album_id)){
                $data['photos'] = $this->dms->get_photos($album_id);
                $this->load->view('photos_view', $data);
            }
        }
        else{
            $this->load->view('gallery_view', $data);
        }


        $this->load->view('footer');
    }

    public function activitys(){
        $this->load->view('header');

        if ($this->uri->segment(3)){
            $activity_id = $this->security->xss_clean(htmlspecialchars(trim($this->uri->segment(3))));
            if (is_numeric($activity_id)){
                @$data['activity'] = $this->dms->get_activity($activity_id)[0];
                $this->load->view('activity_one_view', $data);
            }

        }
        else{
            $data['activityes'] = $this->dms->get_activitys();
            $this->load->view('activity_view', $data);
        }

        $this->load->view('footer');
    }

    public function contacts(){
        $this->load->view('header');
        $this->load->view('contacts_view');
        $this->load->view('footer');
    }

    public function abouth(){
        $this->load->view('header');
        $this->load->view('abouth_view');
        $this->load->view('footer');
    }
}
