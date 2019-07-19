<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users_Front extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model(['usuario', 'evento','cita','categoria_evento', 'usuario_eventos_preferido','usuario_tipo_relacion','imagenes_usuario','usuarios_evento']);

        $this->usuario_logueado = $this->session->userdata('user_id');
        $this->avatar_usuario = $this->imagenes_usuario->usuario_avatar($this->usuario_logueado);
        if (! ini_get('date.timezone')) {
            date_default_timezone_set('GMT');
            setlocale(LC_ALL, "es_ES");
            setlocale(LC_TIME, 'es_AR');
        }
        $this->data['thumbnail_sizes'] = array(); //thumbnails sizes
    }


    /* LOGIN DEL USUARIO DESDE EL FRONT */
    public function ingreso()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|trim');

        $this->form_validation->set_message('required', "El campo %s es requerido");
        #Paso validacion
        if ($this->form_validation->run()) {
            $access_granted = $this->usuario->check_credentials_front(trim($this->input->post('email')), trim($this->input->post('password')));

            $this->output->enable_profiler(true);

            if ($access_granted===false) {
                $this->session->set_flashdata('error', 'No se encuentra usuario con esos datos.');
                redirect('ingreso', 'refresh');
            } else {
                redirect('/');
            }
        }
        //No paso la validacion
        $data['content'] = 'frontend/login-and-signup';
        $this->load->view('frontend_main', $data);
    }
    /* LOGOUT */
    public function desconectar()
    {
        $this->usuario->logout_front();
        $this->session->set_flashdata('success', 'Sesion finalizada.');
        redirect('/', 'refresh');
    }


    public function perfil()
    {
        if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Necesitas ingresar con tu email y contraseña.');
            redirect('ingreso');
        }
        $data['usuario'] = $this->usuario->get_record($this->session->userdata('user_id'));
        #$data['experiencias'] = $this->experiencia->get_records_by_user( $this->session->userdata('user_id') );
        $data['content'] = 'frontend/perfil';
        $this->load->view('frontend_main', $data);
    }


    //create
    public function registro()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
				$this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[usuarios.email]|valid_email');
        #$this->form_validation->set_rules('nickname', 'Nickname', 'required|is_unique[usuarios.nickname]|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        #$this->form_validation->set_rules('password_conf', 'Confirmacion password', 'required|min_length[3]|max_length[20]|matches[password]');


        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        $this->form_validation->set_message('is_unique', 'Ya existe otro usuario registrado con ese %s');
        $this->form_validation->set_message('valid_email', "La direccion de email no tiene un formato valido.");
        $this->form_validation->set_message('password_conf', "La direccion de email no coincide con la confirmacion.");
        $this->form_validation->set_message('min_length', "Ingrese un minimo de 3 caracteres y 20 como maximo para %s.");
        $this->form_validation->set_message('matches', 'No coincide el campo "Password" con "Confirmacion password".');
        if ($this->form_validation->run() === false) {
            $this->load->helper('form');
            $data['title'] = '';
            $data['content'] = 'frontend/login-and-signup';
            $this->load->view('frontend_main', $data);
        } else {


        // set default time zone if not set at php.ini
            if (!date_default_timezone_get('date.timezone')) {
                date_default_timezone_set('America/Buenos_Aires');
            }
            $ahora = date("Y-m-d H:i:s");


            //encrypto

            $salt = md5(uniqid(rand(), true));
            $hash = hash('sha512', $salt.$this->input->post('password'));
            $nick_sanitizado = url_title($this->input->post('nickname'), 'dash', true);

            $newusuario = array(
            'nombre' => $this->input->post('nombre'),
						'apellido' => $this->input->post('apellido'),
            'email' => $this->input->post('email'),
            'nickname' => $nick_sanitizado,
            'password' => $hash,
            'salt' => $salt,
        );
            #save
            $ultimo = $this->usuario->add_record($newusuario);
            $this->session->set_flashdata('success', 'Tu cuenta ha sido creada!');

            //creo la session de logueado
            $this->session->set_userdata(array(
        'user_id' => $ultimo,
        'user_email' => $this->input->post('email'),
        'user_nickname' => $nick_sanitizado
        ));


            redirect('/', 'refresh');
        }
    }


    //RESET
    public function reset_password()
    {
        $data['content'] = 'reset_password';
        $this->load->view('frontend_main', $data);
    }
    public function solicitud_reset_password()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');

        $this->form_validation->set_message('required', "Ingrese su cuenta de email asociada.");
        $this->form_validation->set_message('valid_email', "Ingrese una cuenta de email valido.");
        $this->form_validation->set_message('email_check', "no existe usuario registrado con esa direccion de email.");

        if ($this->form_validation->run() === false) {
            $this->load->helper('form');

            $data['title'] = '';
            $data['content'] = 'reset_password';
            $this->load->view('frontend_main', $data);
        } else {



        //verifico que exista ese email
            $usuario = $this->usuario->select_by_email($this->input->post('email'));

            if ($usuario->row('id')) {
                $nueva_solicitud = array(
                'user_id' => $usuario->row('id'),
                'user_email' => $usuario->row('email'),
                'validacion_key' => $validation_salt = md5(uniqid(rand(), true)),
                'ip' => $_SERVER['REMOTE_ADDR'],
            );

                $this->solicitud_reset->add_record($nueva_solicitud);

                /*EMAIL TO USER */
                $this->load->library('email');

                $this->email->initialize(array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.hubermann.com',
                'smtp_user' => 'info@10en8.com',
                'smtp_pass' => 'Summer6969',
                'smtp_port' => 25,
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype'  => 'html',
                'charset' => 'utf-8',
                'wordwrap' => true
            ));

                $link_reset = base_url('callback_reset_validation/'.$validation_salt);
                $message = '<h3>Cambiar contraseña de 10en8.com</h3>
								<p>Hemos recibido su solicitud para cambiar la contraseña asociada a su correo electrónico en 10en8.com. </p>

								<p>Para inicar el proceso de recuper de contrasela haga clic en el siguiente en enlace: <a href="'.$link_reset.'">'.$link_reset.'</a> </p>

								<p>Si ha recibido este correo por error, seguramente otra persona escribió su correo electrónico por error para cambiar la contraseña. Si no inició usted esta solicitud, no necesita realizar nada y descarte este correo electrónico.
								</p>
								<p>Muchas gracias.</p>';

                $this->email->from('no-reply@10en8.com', 'Cambiar contraseña de 10en8.com');
                $this->email->to($usuario->row('email'));
                #$this->email->cc('another@another-example.com');
                #$this->email->bcc('them@their-example.com');
                $this->email->subject('Reset pass');
                $this->email->message($message);
                $this->email->send();

                #echo $this->email->print_debugger();

                $this->session->set_flashdata('success', 'Revisa tu correo electrónico. Te hemos enviado un enlace para que puedas recuperar tu contraseña. ');

                redirect('/', 'refresh');
            }//fin if user_email exists
        }//fin (else) paso validacion
    }

    //valida si existe un user con esa direccion de email
    public function email_check($email)
    {
        return $this->usuario->check_email_exist($this->input->post('email'));
    }

    //viene de un mail con random para reset password
    public function callback_reset_password()
    {
        if ($this->uri->segment(2)!="") {//veo que no este vacia la solicituda
            //busco por callback
            $solicitud = $this->solicitud_reset->by_callback($this->uri->segment(2));
            if (!$solicitud) {
                $this->session->set_flashdata('error', 'No se encuentra esa solicitud!');
                redirect('ingreso', 'refresh');
            } else {
                //Si encuentro por callback veo la fecha

                #strtotime($solicitud->created_at) < time();
                $session_reseteador = array('user_id' => $solicitud->user_id,'user_email' => $solicitud->user_email,'solicitud' => $solicitud->id);
                $this->session->set_userdata('password_reset', $session_reseteador);
                #var_dump($solicitud);
                //si la fecha es aceptable muestro form para nuevo pass
                $data['content'] = 'new_reseted_password';
                $this->load->view('frontend_main', $data);
                //si la fecha caduco lo envio a otro lado
            }
        }
    }


    public function create_new_pass()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_conf', 'Confirmacion password', 'required|min_length[3]|max_length[20]|matches[password]');
        //validaciones
        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        $this->form_validation->set_message('password_conf', "La direccion de email no coincide con la confirmacion.");
        $this->form_validation->set_message('min_length', "Ingrese un minimo de 3 caracteres y 20 como maximo para password.");
        $this->form_validation->set_message('matches', 'No coincide el campo "Password" con "Confirmacion password".');

        if ($this->form_validation->run() === false) {
            $this->load->helper('form');

            $data['title'] = '';
            $data['content'] = 'new_reseted_password';
            $this->load->view('frontend_main', $data);
        } else {
            //Esta todo ok cambio el password por el nuevo y elimino la solicitud de reset.
            // set default time zone if not set at php.ini
            if (!date_default_timezone_get('date.timezone')) {
                date_default_timezone_set('America/Buenos_Aires');
            }
            $ahora = date("Y-m-d H:i:s");

            $salt = md5(uniqid(rand(), true));
            $hash = hash('sha512', $salt.$this->input->post('password'));
            $editedusuario = array(
            'password' => $hash,
            'salt' => $salt,
            'updated_at' => $ahora,
        );
            #var_dump($this->session->userdata('password_reset'));
            $session_solicitud = array();
            $session_solicitud = $this->session->userdata('password_reset');

            $this->solicitud_reset->delete_record($session_solicitud['solicitud']);
            #save
            $this->session->set_flashdata('success', 'Contraseña Actualizada!');
            $this->usuario->update_record($session_solicitud['user_id'], $editedusuario);
            redirect('ingreso', 'refresh');
        }
    }// fin create_new_pass



    /* MODIFICAR PASSWORD */
    public function perfil_modificar_password()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pass_actual', 'Contraseña actual', 'required');
        $this->form_validation->set_rules('nuevo_pass', 'Nueva contraseña', 'required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('repeat_nuevo_pass', 'Nueva contraseña', 'required|min_length[3]|max_length[20]|matches[nuevo_pass]');
        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        $this->form_validation->set_message('min_length', "Ingrese un minimo de 3 caracteres y 20 como maximo para password.");
        $this->form_validation->set_message('matches', 'No coincide el campo "Contraseña" con "Confirmacion contraseña".');
        if ($this->form_validation->run() === false) {
            $this->load->helper('form');

            $data['title'] = '';
            $$data['content'] = 'editar_perfil1';
            $this->load->view('frontend_main', $data);
        } else {
            $usuario_logged = $this->usuario->get_record($this->session->userdata('user_id'));
            $access_granted = $this->usuario->check_credentials_front($this->session->userdata('user_email'), $this->input->post('pass_actual'));
            //Si no coincide su password actual
            #  $this->session->set_flashdata('error', 'No coincide su password actual!');
            if (!$access_granted) {
                redirect('perfil-modificar-acceso');
            }

            // ALL OK PROCEDO A ACTUALIZAR
            $salt = md5(uniqid(rand(), true));
            $hash = hash('sha512', $salt.$this->input->post('nuevo_pass'));

            // set default time zone if not set at php.ini
            if (!date_default_timezone_get('date.timezone')) {
                date_default_timezone_set('America/Buenos_Aires');
            }
            $ahora = date("Y-m-d H:i:s");

            $updated_password = array(
            'password' => $hash,
            'salt' => $salt,
            'updated_at' => $ahora,
        );

            $this->session->set_flashdata('success', 'Password Actualizado!');
            $this->usuario->update_record($this->session->userdata('user_id'), $updated_password);
            redirect('perfil', 'refresh');
        }//fin (else) paso validacion
    }






    public function experiencias_modificar()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }

        $data['experiencias'] = $this->experiencia->get_records_by_user($this->session->userdata('user_id'));
        $data['content'] = 'experiencias_editar';
        $this->load->view('frontend_main', $data);
    }

    public function create_experiencia()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }

        if ($this->input->post('from') !="" && $this->input->post('description') != "") {
            $newexperiencia = array( 'user_id' => $this->session->userdata('user_id'),
        'from' => $this->input->post('from'),
        'to' => $this->input->post('to'),
        'company' => $this->input->post('company'),
        'description' => $this->input->post('description'),
        'position' => $this->input->post('position'),
        );
            #save
            $this->experiencia->add_record($newexperiencia);
            $this->session->set_flashdata('success', 'experiencia creada.');
            redirect('experiencias-editar');
        } else {
            $this->session->set_flashdata('error', 'Deben completarse los campos "Empresa", "Desde", "Hasta" y "Descripción".');
        }


        $data['experiencias'] = $this->experiencia->get_records_by_user($this->session->userdata('user_id'));
        $data['content'] = 'experiencias_editar';
        $this->load->view('frontend_main', $data);
    }


    public function delete_experiencia()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }
        $id_exp = $this->uri->segment(2);

        $exp = $this->experiencia->get_record($this->uri->segment(2));

        if ($exp->user_id == $this->session->userdata('user_id')) {
            $this->experiencia->delete_record($id_exp);
            $this->session->set_flashdata('success', 'Experiencia laboral eliminada.');
        }

        redirect('experiencias-editar');
    }

    public function editar_experiencia()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }
        $id_exp = $this->uri->segment(2);

        $exp = $this->experiencia->get_record($this->uri->segment(2));
        if ($exp->user_id == $this->session->userdata('user_id')) {
            $data['id_exp'] = $exp->id;
            $data['content'] = 'experiencia_editar';
            $data['experiencia'] = $exp;
            $this->load->view('frontend_main', $data);
        } else {
            redirect('experiencias-editar');
        }
    }

    public function update_experiencia()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }
        $id_exp = $this->input->post('id');

        $exp = $this->experiencia->get_record($id_exp);
        if ($exp->user_id == $this->session->userdata('user_id')) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('from', 'From', 'required');
            $this->form_validation->set_rules('to', 'To', 'required');
            $this->form_validation->set_rules('company', 'Company', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('position', 'Position', 'required');


            $this->form_validation->set_message('required', 'El campo %s es requerido.');

            if ($this->form_validation->run()) {
                $editedexperiencia = array(
            'from' => $this->input->post('from'),
            'to' => $this->input->post('to'),
            'company' => $this->input->post('company'),
            'description' => $this->input->post('description'),
            'position' => $this->input->post('position'),
            );
                #save
                $this->session->set_flashdata('success', 'experiencia Actualizada!');
                $this->experiencia->update_record($exp->id, $editedexperiencia);
                redirect('experiencias-editar');
            }

            //try again
            $data['content'] = 'experiencia_editar';
            $data['experiencia'] = $exp;
            $this->load->view('frontend_main', $data);
        }
    }

    /* EDITAR DATOS DEL PERFIL */
    public function perfil_modificar()
    {

        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');

        // para evitar que de error de que el mail no es unique
        $info_user = $this->usuario->get_record($this->session->userdata('user_id'));
        // if ($this->input->post('email') != $original_email = $info_user->email) {
        //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuarios.email]');
        //     $this->form_validation->set_message('is_unique', 'Existe registro con ese mail.');
        // } else {
        //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // }



        // para evitar que de error de que el nickanme no es unique
        if ($this->input->post('nickname') != $original_nick = $info_user->nickname) {
            $this->form_validation->set_rules('nickname', 'Nickname', 'required|is_unique[usuarios.nickname]|min_length[3]|max_length[20]');
            $this->form_validation->set_message('is_unique', 'Existe registro con ese Nickname.');
        } else {
            $this->form_validation->set_rules('nickname', 'Nickname', 'required|min_length[3]|max_length[20]');
        }



        $this->form_validation->set_message('required', 'El campo %s es requerido.');

        //$this->form_validation->set_message('valid_email', 'El mail debe ser valido.');
        $this->form_validation->set_message('is_unique', 'El %s existe asociado a otra cuenta.');



        if ($this->form_validation->run() === false) {
            $this->load->helper('form');

            $data['title'] = 'Modificar mis datos';
            $data['content'] = 'frontend/perfil-editar';
            $data['query'] = $this->usuario->get_record($this->session->userdata('user_id'));
            $data['categorias_eventos'] = $this->categoria_evento->get_records_menu();
            $data['tipos_relacion_user']= $this->usuario_tipo_relacion->get_records_by_user($this->session->userdata('user_id'));
            $data['usuario_eventos_preferidos']= $this->usuario_eventos_preferido->get_records_by_user($this->session->userdata('user_id'));
            $data['imagenes_usuario'] = $this->imagenes_usuario->imagenes_usuario($this->session->userdata('user_id'));

            $this->load->view('frontend_main', $data);
        } else {
            $id=  $this->input->post('id');

            // set default time zone if not set at php.ini
            if (!date_default_timezone_get('date.timezone')) {
                date_default_timezone_set('America/Buenos_Aires');
            }
            $ahora = date("Y-m-d H:i:s");


            //encrypto

            $salt = md5(uniqid(rand(), true));
            #$hash = hash('sha512', $salt.$this->input->post('password'));

            $month_nac = $this->input->post('birthday_month');
            $year_nac = $this->input->post('birthday_year');
            $day_nac = $this->input->post('birthday_day');

            $nick_sanitizado = url_title($this->input->post('nickname'), 'dash', true);

            $birthday_day = "$year_nac-$month_nac-$day_nac";
            $editedusuario = array(
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'email' => $this->input->post('email'),
            'profile' => $this->input->post('profile'),
            'nickname' => $nick_sanitizado,
            'presentation' => $this->input->post('presentation'),
            'education_degree' => $this->input->post('education_degree'),
            'education' => $this->input->post('education'),
            'birthday' => $birthday_day,
            'nationality' => $this->input->post('nationality'),
            'contact_info' => $this->input->post('contact_info'),
            'updated_at' => $ahora,
        );

            #save
            $this->session->set_flashdata('success', 'usuario Actualizado!');
            $this->usuario->update_record($id, $editedusuario);
            if ($this->input->post('id')!="") {
                $this->session->set_flashdata('success', 'Tu perfil se actualizo.');
                redirect('perfil', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Tu perfil no pudo ser actualizado.');
                redirect('perfil', 'refresh');
            }
        }
    }


    public function update_tab_datos()
    {

        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');

        // para evitar que de error de que el mail no es unique
        $info_user = $this->usuario->get_record($this->session->userdata('user_id'));


        // para evitar que de error de que el nickanme no es unique
        if ($this->input->post('nickname') != $original_nick = $info_user->nickname) {
            $this->form_validation->set_rules('nickname', 'Nickname', 'required|is_unique[usuarios.nickname]|min_length[3]|max_length[20]');
            $this->form_validation->set_message('is_unique', 'Existe registro con ese Nickname.');
        } else {
            $this->form_validation->set_rules('nickname', 'Nickname', 'required|min_length[3]|max_length[20]');
        }

        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        $this->form_validation->set_message('is_unique', 'El %s existe asociado a otra cuenta.');

        if ($this->form_validation->run() === false) {
            $this->load->helper('form');

            $data['title'] = 'Modificar mis datos';
            $data['content'] = 'frontend/perfil-editar';
            $data['query'] = $this->usuario->get_record($this->session->userdata('user_id'));
            $data['categorias_eventos'] = $this->categoria_evento->get_records_menu();
            $data['tipos_relacion_user']= $this->usuario_tipo_relacion->get_records_by_user($this->session->userdata('user_id'));
            $data['usuario_eventos_preferidos']= $this->usuario_eventos_preferido->get_records_by_user($this->session->userdata('user_id'));
            $data['imagenes_usuario'] = $this->imagenes_usuario->imagenes_usuario($this->session->userdata('user_id'));

            $this->load->view('frontend_main', $data);
        } else {
            $id=  $this->input->post('id');

            // set default time zone if not set at php.ini
            if (!date_default_timezone_get('date.timezone')) {
                date_default_timezone_set('America/Buenos_Aires');
            }
            $ahora = date("Y-m-d H:i:s");

            $nick_sanitizado = url_title($this->input->post('nickname'), 'dash', true);

            $editedusuario = array(
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'nickname' => $nick_sanitizado,
            'updated_at' => $ahora,
        );

            if ($this->usuario->update_record($id, $editedusuario)) {
                $this->session->set_flashdata('success', 'Tu perfil se actualizo.');
                redirect('perfil-editar', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Tu perfil no pudo ser actualizado.');
                redirect('perfil-editar', 'refresh');
            }
        }
    }



    public function update_tab_busco()
    {
      //limpiar los actuales #relaciones_tipo
      $this->usuario_tipo_relacion->reset($this->session->userdata('user_id'));

      if($this->input->post('relaciones_tipo')){
        foreach ($this->input->post('relaciones_tipo') as $key => $value) {
          $relacion = [ 'user_id' => $this->session->userdata('user_id'), 'tipo_relacion_id' =>  $value];
          $this->usuario_tipo_relacion->add_record($relacion);
          $relacion =[];
        }
      }

      //limpiar los actuales #eventos
      $this->usuario_eventos_preferido->reset($this->session->userdata('user_id'));
      if($this->input->post('tipos_eventos')){
        foreach ($this->input->post('tipos_eventos') as $key => $value) {
          $tipo_evento = [ 'user_id' => $this->session->userdata('user_id'), 'evento_id' =>  $value];
          $this->usuario_eventos_preferido->add_record($tipo_evento);
          $tipo_evento =[];
        }
      }

      redirect('perfil-editar', 'refresh');
    }


    public function update_tab_descripcion()
    {

      $datos_update = [
        'estatura' => $this->input->post('estatura'),
        'peso' => $this->input->post('peso'),
        'contextura_fisica' => $this->input->post('contextura_fisica'),
        'color_ojos' => $this->input->post('color_ojos'),
        'color_pelo' => $this->input->post('color_pelo'),
        'estado_civil' => $this->input->post('estado_civil'),
        'convivencia' => $this->input->post('convivencia'),
        'fuma' => $this->input->post('fuma'),
        'toma' => $this->input->post('toma'),
        'ocupacion' => $this->input->post('ocupacion'),
        'profesion' => $this->input->post('profesion'),
        'bio' => $this->input->post('bio'),
        'busco' => $this->input->post('busco'),
        'hijos' => $this->input->post('hijos'),
      ];

      $this->usuario->update_record($this->session->userdata('user_id'), $datos_update);
      $this->session->set_flashdata('success', 'Información actualizada.');
      redirect('perfil-editar#tab_editar_descripcion', 'refresh');
    }

    public function add_imagen(){
    	$file =[];
    			//adjunto
    		if($_FILES['adjunto']['size'] > 0 && $_FILES['adjunto']['name'] != ""){

    		$file  = $this->upload_file();

    		if ( $file['status'] != 0 ){
    		//guardo
    			$nueva_imagen = array(
    				'usuario_id' => $this->session->userdata('user_id'),
    				'filename' => $file['filename'],
    				);
    		#save
    			$this->session->set_flashdata('success', 'Imagen cargada!');
    			$this->imagenes_usuario->add_record($nueva_imagen);
    			redirect('perfil-editar', 'refresh');
    		}
    		$this->session->set_flashdata('error', $file['msg']);
    	}
    	redirect('perfil-editar', 'refresh');
    }

    public function perfil_modificar_imagen()
    {
        $data['title'] = '';
        $data['content'] = 'perfil_editar_imagen';
        $this->load->view('frontend_main', $data);
    }

    public function perfil_delete_image()
    {
      $id_imagen = $this->uri->segment(2);

      $imagen = $this->imagenes_usuario->get_record($id_imagen);

      if($imagen->usuario_id == $this->session->userdata('user_id'))
      {
        $path = 'images-usuarios/'.$imagen->filename;
      	unlink($path);

      	$this->imagenes_usuario->delete_record($id_imagen);
      }

    }



    /*******  FILE ADJUNTO  ********/
    public function upload_file(){

    	//1 = OK - 0 = Failure
    	$file = array('status' => '', 'filename' => '', 'msg' => '' );

    	array('image/jpeg','image/pjpeg', 'image/jpg', 'image/png', 'image/gif','image/bmp');
    	//check extencion
    	/*
    	$file_extensions_allowed = array('application/pdf', 'application/msword', 'application/rtf', 'application/vnd.ms-excel','application/vnd.ms-powerpoint','application/zip','application/x-rar-compressed', 'text/plain');
    	$exts_humano = array('PDF', 'WORD', 'RTF', 'EXCEL', 'PowerPoint', 'ZIP', 'RAR');
    	*/
    	$file_extensions_allowed = array('image/jpeg','image/pjpeg', 'image/jpg', 'image/png', 'image/gif','image/bmp');
    	$exts_humano = array('JPG', 'JPEG', 'PNG', 'GIF');


    	$exts_humano = implode(', ',$exts_humano);
    	$ext = $_FILES['adjunto']['type'];
    	#$ext = strtolower($ext);
    	if(!in_array($ext, $file_extensions_allowed)){
    		$exts = implode(', ',$file_extensions_allowed);

    		$file['msg'] .="<p>".$_FILES['adjunto']['name']." <br />Puede subir archivos que tengan alguna de estas extenciones: ".$exts_humano."</p>";
    		$file['status'] = 0 ;
    	}else{
    		include(APPPATH.'libraries/class.upload.php');
    		$yukle = new upload;
    		$yukle->set_max_size(1900000);
    		$yukle->set_directory('./images-usuarios');
    		$yukle->set_tmp_name($_FILES['adjunto']['tmp_name']);
    		$yukle->set_file_size($_FILES['adjunto']['size']);
    		$yukle->set_file_type($_FILES['adjunto']['type']);
    		$random = substr(md5(rand()),0,6);
    		$name_whitout_whitespaces = str_replace(" ","-",$_FILES['adjunto']['name']);
    		$imagname=''.$random.'_'.$name_whitout_whitespaces;
    		#$thumbname='tn_'.$imagname;
    		$yukle->set_file_name($imagname);


    		$yukle->start_copy();



    		if($yukle->is_ok()){

    			if(count($this->data['thumbnail_sizes'])){
    				foreach ($this->data['thumbnail_sizes'] as $thumb_size) {
                            //create thumbnail
                            #$yukle->resize(1000,0);
                            #$$yukle->set_thumbnail_name('tn_'.$thumb_size.'_'.$imagname);
                            #$$result_thumb = $yukle->create_thumbnail();
                            #$$yukle->set_thumbnail_size($thumb_size, 0);
    				}
    			}

                    //UPLOAD ok
    			$file['filename'] = $imagname;
    			$file['status'] = 1;
    		}
    		else{
    			$file['status'] = 0 ;
    			$file['msg'] = 'Error al subir archivo';
    		}



    		//clean
    		$yukle->set_tmp_name('');
    		$yukle->set_file_size('');
    		$yukle->set_file_type('');
    		$imagname='';
    	}//fin if(extencion)


    	return $file;
    }

    public function mis_eventos()
    {
      if (!$this->session->userdata('user_id')) {
          $this->session->set_flashdata('error', 'Necesitas ingresar con tu email y contraseña.');
          redirect('ingreso');
      }
      $data['eventos_disponibles'] = $this->evento->get_records();
      $data['query'] = $this->usuario->get_record($this->session->userdata('user_id'));
      $data['content'] = 'frontend/mis-eventos';
      $this->load->view('frontend_main', $data);
    }

    public function mis_coincidencias()
    {
      //muestra de los enventos a los que fue le usuario detalles del evento (lugar, fecha, hora,etc)
      if (!$this->session->userdata('user_id')) {
          $this->session->set_flashdata('error', 'Necesitas ingresar con tu email y contraseña.');
          redirect('ingreso');
      }
      $eventos_confirmados = $this->usuarios_evento->get_asistencias_comfirmadas_by_user($this->session->userdata('user_id'));
      if(!empty($eventos_confirmados))
      {
        $eventos_usuario = [];
        foreach ($eventos_confirmados as $evento_confirmado) {
          #var_dump().die();

          array_push($eventos_usuario,$this->evento->get_record($evento_confirmado['evento_id']));
        }
      }
      $data['eventos_usuario'] = $eventos_usuario;
      $data['query'] = $this->usuario->get_record($this->session->userdata('user_id'));
      $data['content'] = 'frontend/mis-coincidencias';
      $this->load->view('frontend_main', $data);
    }

    public function detalle_coincidencias()
    {
      //muestra del evento seleccionado las coincidnecias o no con los otros participantes
      if (!$this->session->userdata('user_id') || !$this->uri->segment(2)) {
          $this->session->set_flashdata('error', 'Necesitas ingresar con tu email y contraseña.');
          redirect('ingreso');
      }
      $data['citas'] = $this->cita->citas_by_evento($this->uri->segment(2), $this->session->userdata('user_id'));


      $data['query'] = $this->usuario->get_record($this->session->userdata('user_id'));
      #var_dump($data['citas']);
      $data['content'] = 'frontend/detalle-coincidencias';
      $this->load->view('frontend_main', $data);
    }

    public function mis_contactos()
    {
      if (!$this->session->userdata('user_id')) {
          $this->session->set_flashdata('error', 'Necesitas ingresar con tu email y contraseña.');
          redirect('ingreso');
      }
      $data['query'] = $this->usuario->get_record($this->session->userdata('user_id'));
      $data['usuario_contactos'] = [];
      $data['content'] = 'frontend/mis-contactos';
      $this->load->view('frontend_main', $data);
    }


    public function actualizar_avatar()
    {
      if($this->input->post('imagen_id') && $this->session->userdata('user_id'))
      {
        if($this->imagenes_usuario->update_avatar($this->input->post('imagen_id'),$this->session->userdata('user_id')))
        {
          $this->session->set_flashdata('success', 'Imagen principal actualizada.');
          redirect('perfil-editar', 'refresh');
        }else{
          $this->session->set_flashdata('error', 'No pudimos modificar la imagen. Intenta dentro de unos minutos por favor.');
          redirect('perfil-editar', 'refresh');
        }
      }
    }


    public function solicitar_asistencia_evento()
    {
      if($this->uri->segment(2) && $this->session->userdata('user_id'))
      {
        if($this->usuarios_evento->solicitar_asistencia($this->session->userdata('user_id'), $this->uri->segment(2)))
        {
          $this->session->set_flashdata('success', 'Tu solicitud de asistencia a el evento ha sido enviada.');
          redirect('mis-eventos', 'refresh');
        }else{
          $this->session->set_flashdata('error', 'Tu solicitud no pudo procesar. Intenta luego o comunicate con nosotros por favor y te brindaremos asistencia.');
          redirect('mis-eventos', 'refresh');
        }
      }
    }



    //estaticas
    public function como_funciona()
    {
      $data['content'] = 'frontend/como-funciona.php';
      $this->load->view('frontend_main', $data);
    }

    public function preguntas_frecuentes()
    {
      $data['content'] = 'frontend/preguntas-frecuentes.php';
      $this->load->view('frontend_main', $data);
    }

    public function quienes_somos()
    {
      $data['content'] = 'frontend/quienes-somos.php';
      $this->load->view('frontend_main', $data);
    }

}//END CLASS
