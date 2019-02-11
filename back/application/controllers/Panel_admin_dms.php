<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// подключаем общую библиотеку + конфиг
require_once(APPPATH . 'dmconfig.php');

class Panel_admin_dms extends CI_Controller {

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

    function add_upc_event(){
        $this->load->view('header');

        $data['message'] = '';

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');



        //проверка на загрузку файла
        $config['upload_path']          = FCPATH.'/images/upc_events/';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 6000;

        $this->load->library('upload', $config);




        $this->form_validation->set_rules('short_name', 'Короткое название', 'required', ['required' => 'Поле %s обязательно для заполнения']);
        $this->form_validation->set_rules('full_name', 'Полное название', 'required', ['required' => 'Поле %s обязательно для заполнения']);
        $this->form_validation->set_rules('text', 'Текст', 'required', ['required' => 'Поле %s обязательно для заполнения']);
        $this->form_validation->set_rules('period', 'Период события', 'required', ['required' => 'Поле %s обязательно для заполнения']);

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('paneladmin/add_upc_events', $data);
        }
        else
        {

            if ( ! $this->upload->do_upload('foto'))
            {
                $data['message'] = $this->upload->display_errors();
                print_r($data['message']);
            }
            else
            {
                $data_upload = $this->upload->data();
                $short_name = $this->security->xss_clean($this->input->post('short_name'));
                $full_name = $this->security->xss_clean($this->input->post('full_name'));
                $text = $this->security->xss_clean($this->input->post('text'));
                $period = $this->security->xss_clean($this->input->post('period'));
                $foto = $data_upload['file_name'];


                $this->db->insert('upc_events', ['short_name' => $short_name, 'full_name' => $full_name, 'text_info' => $text, 'foto' => $foto, 'date_event' => $period]);
                $data['message'] = '<div class="alert alert-success">Мероприятие добавлено</div>';

            }

            $this->load->view('paneladmin/add_upc_events', $data);
        }



		$this->load->view('footer');
	}

	function del_upc_event(){
        $this->load->view('header');


        $data['message'] = '';
        $data['upc_events'] = $this->dms->get_upc_events();

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');




        $this->form_validation->set_rules('id_upc_event', 'id ', 'required|callback_check_id_event', ['required' => 'Выберите %s']);


        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('paneladmin/del_upc_events', $data);
        }
        else
        {
            $id_upc_event = $this->security->xss_clean($this->input->post('id_upc_event'));
            $this->db->delete('upc_events', ['id' => $id_upc_event]);

            $short_name = $this->security->xss_clean($this->input->post('short_name'));
            $data['message'] = '<div class="alert alert-success">Мероприятие '.$short_name.' удалено</div>';
            $data['upc_events'] = $this->dms->get_upc_events();
            $this->load->view('paneladmin/del_upc_events', $data);
        }



        $this->load->view('footer');
    }

    function check_id_event($str){
        if (!is_numeric($str))
        {
            $this->form_validation->set_message('short_name', 'xss');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function add_album(){
        $this->load->helper('html');
        $this->load->view('header');

        $data['message'] = '';

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');




        $this->form_validation->set_rules('name', 'Название альбома', 'required|htmlspecialchars', ['required' => 'Укажите %s']);
        $this->form_validation->set_rules('info_album', 'Информация об альбоме', 'htmlspecialchars');
        $this->form_validation->set_rules('date_album', 'Дата альбома ', 'htmlspecialchars');
        //$this->form_validation->set_rules('logo', 'Логотип альбома', 'required|htmlspecialchars', ['required' => 'Укажите %s']);
        //$this->form_validation->set_rules('folder_album', 'Название альбома', 'required|str2url|htmlspecialchars', ['required' => 'Укажите %s']);


        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');



        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('paneladmin/add_album', $data);
        }
        else
        {

            $folder_album = str2url($this->security->xss_clean($this->input->post('name')));
            if (file_exists(FCPATH.'/images/gallery/'.$folder_album)){
                $folder_album = $folder_album.'_cp';
            }
            mkdir(FCPATH.'/images/gallery/'.$folder_album, 0777, true);
            //проверка на загрузку файла
            $config['upload_path']          = FCPATH.'/images/gallery/'.$folder_album;
            $config['allowed_types']        = 'gif|jpg|png|JPG|jpeg';
            $config['max_size']             = 6000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('logo'))
            {
                $data['message'] = $this->upload->display_errors();
                print_r($data['message']);
            }
            else
            {
                $data_upload = $this->upload->data();
                $name = $this->security->xss_clean($this->input->post('name'));
                $info_album = $this->security->xss_clean($this->input->post('info_album'));
                $date_album = $this->security->xss_clean($this->input->post('date_album'));
                $logo = $data_upload['file_name'];


                $this->db->insert('albums', ['name' => $name, 'logo' => $logo, 'folder_album' => $folder_album, 'info_album' => $info_album, 'date_album' => $date_album]);
                $data['message'] = '<div class="alert alert-success">Фотоальбом добавлен</div>';

            }
            $this->load->view('paneladmin/add_album', $data);


        }

        $this->load->view('footer');
    }

    function del_album(){
        $this->load->view('header');


        $data['message'] = '';
        $data['albums'] = $this->dms->get_albums();
        //print_r($data['albums']);

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');




        $this->form_validation->set_rules('id_album', 'id ', 'required|callback_check_id_event', ['required' => 'Выберите %s']);


        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('paneladmin/del_album', $data);
        }
        else
        {
            $id_album = $this->security->xss_clean($this->input->post('id_album'));
            $name = $this->security->xss_clean($this->input->post('$name'));
            //удаляем всю папку
            $folder_album = $this->dms->get_info_album($id_album)[0]['folder_album'];
            rrmdir(FCPATH.'/images/gallery/'.$folder_album);
            //удаляем с бд
            $this->db->delete('albums', ['id' => $id_album]);


            $data['message'] = '<div class="alert alert-success">Фотоальбом '.$name.' удален</div>';
            $data['albums'] = $this->dms->get_albums();
            $this->load->view('paneladmin/del_album', $data);
        }



        $this->load->view('footer');
    }

    function add_del_photos_album(){
        $this->load->view('header');

        $data['message'] = '';

        $data['albums'] = $this->dms->get_albums();

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');




        $this->form_validation->set_rules('name', 'Название альбома', 'htmlspecialchars');
        $this->form_validation->set_rules('id_album', 'id', 'htmlspecialchars|is_numeric');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');



        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('paneladmin/add_del_photo_album', $data);
        }
        else
        {

            $folder_album = str2url($this->security->xss_clean($this->input->post('name')));
            mkdir(FCPATH.'/images/gallery/'.$folder_album, 0777, true);
            //проверка на загрузку файла
            $config['upload_path']          = FCPATH.'/images/gallery/'.$folder_album;
            $config['allowed_types']        = 'gif|jpg|png|JPG|.jpeg';
            $config['max_size']             = 6000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('logo'))
            {
                $data['message'] = $this->upload->display_errors();
                print_r($data['message']);
            }
            else
            {
                $data_upload = $this->upload->data();
                $name = $this->security->xss_clean($this->input->post('name'));
                $info_album = $this->security->xss_clean($this->input->post('info_album'));
                $date_album = $this->security->xss_clean($this->input->post('date_album'));
                $logo = $data_upload['file_name'];


                $this->db->insert('albums', ['name' => $name, 'logo' => $logo, 'folder_album' => $folder_album, 'info_album' => $info_album, 'date_album' => $date_album]);
                $data['message'] = '<div class="alert alert-success">Фотоальбом добавлен</div>';

            }
            $this->load->view('paneladmin/add_del_photo_album', $data);


        }

        $this->load->view('footer');
    }

    function add_del_photo_id(){
        $this->load->view('header');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $data['message'] = '';

        $this->form_validation->set_rules('name_photo', 'Название фото', 'htmlspecialchars');
        $this->form_validation->set_rules('id_album', 'id_album', 'required|htmlspecialchars|is_numeric', ['required' => 'Укажите %s']);
        //$this->form_validation->set_rules('logo', 'Логотип альбома', 'required|htmlspecialchars', ['required' => 'Укажите %s']);
        //$this->form_validation->set_rules('folder_album', 'Название альбома', 'required|str2url|htmlspecialchars', ['required' => 'Укажите %s']);


        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');



        if ($this->form_validation->run() == FALSE)
        {
            //$this->load->view('paneladmin/add_album', $data);
        }
        else
        {


            $folder_album = $this->security->xss_clean($this->dms->get_info_album($this->input->post('id_album')))[0]['folder_album'];
            //mkdir(FCPATH.'/images/gallery/'.$folder_album, 0777, true);
            //проверка на загрузку файла
            $config['upload_path']          = FCPATH.'/images/gallery/'.$folder_album;
            $config['allowed_types']        = 'gif|jpg|png|JPG|jpeg';
            $config['max_size']             = 8000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('foto'))
            {
                $data['message'] = $this->upload->display_errors();
                print_r($data['message']);
            }
            else
            {
                $data_upload = $this->upload->data();
                $name = $this->security->xss_clean($this->input->post('name_photo'));
                $id_album = $this->security->xss_clean($this->input->post('id_album'));
                $photoo = $data_upload['file_name'];


                $this->db->insert('photos', ['name_photo' => $name, 'photo' => $photoo, 'id_album' => $id_album]);
                $data['message'] = '<div class="alert alert-success">Фото '.$photoo.' добавлено</div>';
                header("Refresh:1; url=".WEB_SERVER."/panel_admin_dms/add_del_photo_id/".$id_album);

            }
            $this->load->view('paneladmin/add_album', $data);


        }




	    if ($this->uri->segment(3)){
	        $id_album = $this->security->xss_clean($this->uri->segment(3));
	        $data['id_album'] = $id_album;
	        if (is_numeric($id_album)){
	            $data['fotos'] = $this->dms->get_photos($id_album);
	            //print_r($data['fotos']);





                $this->form_validation->set_rules('id_photo', 'id ', 'required|is_numeric|htmlspecialchars|trim', ['required' => 'Выберите %s']);
                $this->form_validation->set_rules('name_photo', 'название ', 'htmlspecialchars', ['required' => 'Выберите %s']);
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('paneladmin/add_del_photo_id', $data);
                }
                else
                {
                    $id_photo = $this->security->xss_clean($this->input->post('id_photo'));
                    $name_photo = $this->security->xss_clean($this->input->post('name_photo'));
                    $folder_album = $this->dms->get_info_album($id_album)[0]['folder_album'];
                    $photo = $this->dms->get_info_photo($id_photo)[0]['photo'];
                    //print_r($photo);
                    //кнопка удаления фото
                    //удаляем файл
                    unlink(FCPATH.'/images/gallery/'.$folder_album.'/'.$photo);





                    $data['message'] = '<div class="alert alert-success">Фото '.$name_photo.' удалено из '.$folder_album.'</div>';
                    //удаляем с бд
                    $this->db->delete('photos', ['id' => $id_photo]);

                    header("Refresh:1; url=".WEB_SERVER."/panel_admin_dms/add_del_photo_id/".$id_album);

                    $data['fotos'] = $this->dms->get_photos($id_album);
                    $this->load->view('paneladmin/add_del_photo_id', $data);
                }

            }
        }

        $this->load->view('footer');
    }

    function add_del_carousel(){
        $this->load->view('header');
        $data['carousel'] = $this->dms->get_carousel();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $data['message'] = '';




        if (isset($_POST['delete_carousel'])){
            $id_photo = $this->security->xss_clean($this->input->post('id'));
            if (is_numeric($id_photo)){
                $this->dms->delete_carousel_photo($id_photo);
                $data['message'] = '<div class="alert alert-success">фото удалено</div>';
            }
            $data['carousel'] = $this->dms->get_carousel();
        }

        if (isset($_POST['add_carousel'])){
            $this->form_validation->set_rules('text_info', 'Название фото', 'htmlspecialchars');
            $this->form_validation->set_rules('abouth_info', 'Описание фото', 'htmlspecialchars', ['required' => 'Укажите %s']);


            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if (!$this->form_validation->run() == FALSE)
            {


                $config['upload_path']          = FCPATH.'/images/carousel';
                $config['allowed_types']        = 'gif|jpg|png|JPG|jpeg';
                $config['max_size']             = 8000;
                //mkdir(FCPATH.'/images/gallery/'.$folder_album, 0777, true);
                //проверка на загрузку файла


                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto'))
                {
                    $data['message'] = $this->upload->display_errors();
                    print_r($data['message']);
                }
                else
                {
                    $data_upload = $this->upload->data();
                    $text_info = $this->security->xss_clean($this->input->post('text_info'));
                    $abouth_info = $this->security->xss_clean($this->input->post('abouth_info'));
                    $photoo = $data_upload['file_name'];


                    $this->db->insert('carousel', ['text_info' => $text_info, 'foto' => $photoo, 'abouth_info' => $abouth_info]);
                    $data['message'] = '<div class="alert alert-success">Фото '.$photoo.' добавлено</div>';
                    header("Refresh:1; url=".WEB_SERVER."/panel_admin_dms/add_del_carousel");

                }
            }
        }



        $this->load->view('paneladmin/add_del_carousel', $data);
        $this->load->view('footer');
    }
}
