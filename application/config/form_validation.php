<?php
//regras de validação dos usuarios
$config = array (
    'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => array('required', 'valid_email'),
            'errors' => array(
                'required' => 'Você deve digitar um  %s.',
                'valid_email' => 'O email deve ser válido.',
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Senha',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Você deve digitar uma %s.',
            ),
        ),

    ),

    'register_user' => array(
        array(
            'field' => 'name',
            'label' => 'Nome',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Você deve digitar um  %s.',
            ),
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => array('required', 'valid_email', 'is_unique[Users.email]'),
            'errors' => array(
                'required' => 'Você deve digitar um  %s.',
                'valid_email' => 'O email deve ser válido.',
                'is_unique' => 'O email digitado já está cadastrado.'
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Senha',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Você deve digitar uma %s.',
            ),
        ),
        array(
            'field' => 'passconf',
            'label' => 'Confirme sua senha',
            'rules' => array('required','matches[password]'),
            'errors' => array(
                'required' => 'Você deve confirmar a senha.',
                'matches' => 'As senhas não coincidem.',
            ),
        ),
    ),

    'edit_user' => array(
        array(
            'field' => 'name',
            'label' => 'Nome',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Você deve digitar um  %s.',
            ),
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => array('required', 'valid_email'),
            'errors' => array(
                'required' => 'Você deve digitar um  %s.',
                'valid_email' => 'O email deve ser válido.',
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Senha',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Você deve digitar uma %s.',
            ),
        ),
        array(
            'field' => 'passconf',
            'label' => 'Confirme sua senha',
            'rules' => array('required','matches[password]'),
            'errors' => array(
                'required' => 'Você deve confirmar a senha.',
                'matches' => 'As senhas não coincidem.',
            ),
        ),
    ),

    'recover_email' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => array('required', 'valid_email'),
            'errors' => array(
                'required' => 'Você deve digitar um  %s.',
                'valid_email' => 'O email deve ser válido.',
                ),
            ),
    ),

    'set_new_pass' => array(
        array(
            'field' => 'password',
            'label' => 'Senha',
            'rules' => 'required',
            'errors' => array(
                    'required' => 'Você deve digitar uma %s.',
            ),
        ),
        array(
            'field' => 'passconf',
            'label' => 'Confirme sua senha',
            'rules' => array('required','matches[password]'),
            'errors' => array(
                    'required' => 'Você deve confirmar a senha.',
                    'matches' => 'As senhas não coincidem.',
            ),
        ),
    ),

    'post' => array(
        array(
            'field' => 'title',
            'label' => 'Título',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Você deve digitar um %s.'
            ), 
        ),
        array(
            'field' => 'description',
            'label' => 'Descrição',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Você deve digitar uma %s.'
            )
        ),
        array(
            'field' => 'img_url',
            'label' => 'URL Imagem',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Você deve digitar uma %s.'
            )
        ),
    ),
    
);