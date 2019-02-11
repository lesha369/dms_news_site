<?php

// подключаем общую библиотеку + конфиг
require_once(APPPATH . 'dmconfig.php');

class Dms extends CI_Model {

	function get_carousel_photos(){
	    $data = $this->db->get('carousel')->result_array();
	    return $data;
	}

	function get_upc_events(){
        $data = $this->db->get('upc_events')->result_array();
        return $data;
    }

    function get_upc_event($id){
	    $data = $this->db->get_where('upc_events', ['id' => $id])->result_array();
	    return $data;
    }

    function send_mail($text){

	    /*
        $this->email->from(ADMIN_EMAIL, 'Info');
        $this->email->to(ADMIN_EMAIL);

        $this->email->subject('Новая заявка');
        $this->email->message($text);

        $this->email->send();
	    */
        $subject = "DMS-MOS - Новый запрос";
        $headers = "From: info@dms-mos.ru \r\n";
        mail (ADMIN_EMAIL, $subject, $text, $headers);
    }

    function get_albums(){
	    $data = $this->db->query('select * from albums order by id desc')->result_array();
	    return $data;
    }

    function get_photos($album_id){
        $data = $this->db->query("select p.id, a.name as album_name, a.info_album, a.date_album, p.name_photo, a.folder_album, p.text_foto, p.photo, p.date_foto from `albums` a inner join `photos` p on a.id = p.id_album where a.id = '$album_id'")->result_array();
        return $data;
    }

    function get_info_album($id){
	    $data = $this->db->get_where('albums', ['id' => $id])->result_array();
	    return $data;
    }

    function get_info_photo($id){
	    $data = $this->db->get_where('photos', ['id' => $id])->result_array();
	    return $data;
    }
    function get_activitys(){
	    $data = $this->db->get('activity_table')->result_array();
	    if (!empty($data)){
            return $data;
        }
        else{
            return [0 => null];
        }

    }
    function get_activity($id){
        $data = $this->db->get_where('activity_table', ['id' => $id])->result_array();
        return $data;
    }
    function get_carousel(){
        $data = $this->db->get('carousel')->result_array();
        return $data;
    }
    function delete_carousel_photo($id_photo){
        $this->db->delete('carousel', ['id' => $id_photo]);
    }

    function transliterate($st) {
        $st = strtr($st,
            "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ",
            "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE"
        );
        $st = strtr($st, array(
            'ё'=>"yo",    'х'=>"h",  'ц'=>"ts",  'ч'=>"ch", 'ш'=>"sh",
            'щ'=>"shch",  'ъ'=>'',   'ь'=>'',    'ю'=>"yu", 'я'=>"ya",
            'Ё'=>"Yo",    'Х'=>"H",  'Ц'=>"Ts",  'Ч'=>"Ch", 'Ш'=>"Sh",
            'Щ'=>"Shch",  'Ъ'=>'',   'Ь'=>'',    'Ю'=>"Yu", 'Я'=>"Ya",
        ));
        return $st;
    }
}
