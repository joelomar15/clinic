<?php

namespace App\Controllers;

use App\Models\DoctorModel;

class LoginController extends BaseController
{
    private $doctorModel;
    public function __construct()
    {
        $this->doctorModel = new DoctorModel();
    }

    public function login(): string
    {
        return view('Login/login');
    }

    public function logueado()
    {
        $usuario = $this->request->getPost('usuario');
        $pass = $this->request->getPost('password');

        $result = $this->doctorModel
            ->groupStart()
            ->where('cedula', $usuario)
            ->orWhere('correo', $usuario)
            ->groupEnd()
            ->first();
        if ($result) {
            if (password_verify($pass, $result['clave']) && $result['estado']==1) {
                // La contraseña es válida
                $session = session();
                $cabecera = ['correo' => $result['correo'], 'usuario' => $result['nombre'], 'foto' => $result['foto'], 'cedula' => $result['cedula']];
                $session->set($cabecera);
                return redirect()->to(base_url('/ad/home'));
            } else {
                // La contraseña es incorrecta
                return redirect()->to(base_url('/login'))->with('error', 'Login incorrecto');
            }
        } else {
            return redirect()->to(base_url('/login'))->with('error', 'Login incorrecto');
        }
    }

    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }

    public function registrar(): string
    {
        return view('Login/registrar');
    }

    public function guardar()
    {
        $reglas =
            [
                'usuario' => [
                    'label' => 'Usuario',
                    'rules' => 'required|is_unique[usuarios.nombreUsuario]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio',
                        'is_unique' => 'El Usuario ya existe...',
                    ],
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio...'
                    ],
                ],
                'password' => [
                    'label' => 'Contraseña',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio...'
                    ],
                ],
                'password2' => [
                    'label' => 'Repetir Contraseña',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio...',
                        'matches' => 'Las contraseñas no coinciden...'
                    ],
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $usuario = $this->request->getPost('usuario');
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');
        $data = array(

            'nombreUsuario' => $usuario,
            'contrasena' => password_hash($pass, PASSWORD_DEFAULT),
            'estado' => 1,
            'email' => $email
        );

        $this->doctorModel->insert($data, false);
        return redirect()->to(base_url('/login'));
    }
}
