<?php

namespace App\Controllers;

use App\Models\DoctorModel;

class DoctorController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $doctorModel;
    public function __construct()
    {
        $this->doctorModel = new DoctorModel();
    }


    public function index()
    {
        //
        $result = $this->doctorModel
            ->findAll();
        $cabecera = ['titulo' => 'Nomina de Doctores', 'tipo' => 'Tabla', 'doctores' => $result];
        return view('Admin/Tablas/Doctor', $cabecera);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //


    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $cabecera = ['titulo' => 'Registrar Doctor', 'tipo' => 'Form'];
        return view('Admin/Form/DoctorNew', $cabecera);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function showModal()
    {
        //
        $cabecera = ['titulo' => 'Registrar Empleado', 'tipo' => 'Form'];
        return view('Modal/modalEmpleado', $cabecera);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
        $reglas =
            [
                'nombre' => [
                    'label' => 'Nombre',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ],
                'cedula' => [
                    'label' => 'Cédula',
                    'rules' => 'required|greater_than[0]|is_unique[doctores.cedula]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener solo números',
                        'is_unique' => 'La cédula del Doctor ya existe...'
                    ],
                ],
                'direccion' => [
                    'label' => 'Dirección',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ],
                'telefono' => [
                    'label' => 'Teléfono',
                    'rules' => 'required|greater_than[0]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un número mayor a 0'
                    ],
                ],
                'foto' => [
                    'label' => 'Fotografía',
                    'rules' => 'uploaded[foto]|mime_in[foto,image/png,image/jpeg,image/jpg]|max_size[foto,10000]',
                    'errors' => [
                        'uploaded' => 'Por favor, selecciona un archivo para cargar',
                        'mime_in' => 'Por favor, carga un archivo en formato jpeg, jpg, png',
                        'max_size' => 'El archivo no debe exceder los 10 MB'
                    ]
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getPost('nombre');
        $cedula = $this->request->getPost('cedula');
        $direccion = $this->request->getPost('direccion');
        $email = $this->request->getPost('email');
        $telefono = $this->request->getPost('telefono');
        $estado = 1;

        $mi_archivo = $this->request->getFile('foto');
        if ($mi_archivo->isValid()) {
            $extension = $mi_archivo->getExtension();
            $mi_archivo->move(WRITEPATH . 'uploads/fotoUser/', 'FOTO-' . $cedula . '.' . $extension, true);
        }

        $data = array(
            'nombre' => $nombre,
            'cedula' => $cedula,
            'direccion' => $direccion,
            'correo' => $email,
            'telefono' => $telefono,
            'estado' => $estado,
            'clave' => password_hash($cedula, PASSWORD_DEFAULT),
            'foto' => 'uploads/fotoUser/FOTO-' . $cedula . '.' . $extension
        );

        $this->doctorModel->insert($data, false);
        return redirect()->to(base_url('ad/doctor'));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        $result = $this->doctorModel->find($id);
        $cabecera = ['titulo' => 'Actualizar Doctor', 'tipo' => 'Form', 'doctor' => $result];
        return view('Admin/Form/DoctorEdit', $cabecera);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
        //
        $reglas =
            [
                'nombre' => [
                    'label' => 'Nombre',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ],
                'cedula' => [
                    'label' => 'Cédula',
                    'rules' => 'required|greater_than[0]|is_unique[doctores.cedula,id,' . $id . ']',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener solo números',
                        'is_unique' => 'La cédula del Doctor ya existe...'
                    ],
                ],
                'direccion' => [
                    'label' => 'Dirección',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ],
                'telefono' => [
                    'label' => 'Teléfono',
                    'rules' => 'required|greater_than[0]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un número mayor a 0'
                    ],
                ],
                'foto' => [
                    'label' => 'Fotografía',
                    'rules' => 'mime_in[foto,image/png,image/jpeg,image/jpg]|max_size[foto,10000]',
                    'errors' => [
                        'mime_in' => 'Por favor, carga un archivo en formato jpeg, jpg, png',
                        'max_size' => 'El archivo no debe exceder los 10 MB'
                    ]
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getPost('nombre');
        $cedula = $this->request->getPost('cedula');
        $direccion = $this->request->getPost('direccion');
        $email = $this->request->getPost('email');
        $telefono = $this->request->getPost('telefono');

        if ($cedula == session('cedula')) {
            session()->set('usuario', $nombre);
        }

        $data = array(
            'nombre' => $nombre,
            'cedula' => $cedula,
            'direccion' => $direccion,
            'correo' => $email,
            'telefono' => $telefono,
        );

        $mi_archivo = $this->request->getFile(fileID: 'foto');
        if ($mi_archivo->isValid()) {
            $uploadPath = WRITEPATH . 'uploads/fotoUser/';
            $fileNamePattern = $uploadPath . 'FOTO-' . $cedula . '.*'; // Busca cualquier extensión

            // Eliminar cualquier archivo que coincida con el patrón
            foreach (glob($fileNamePattern) as $oldFile) {
                unlink($oldFile); // Eliminar archivo
            }

            $extension = $mi_archivo->getExtension();
            $mi_archivo->move(WRITEPATH . 'uploads/fotoUser/', 'FOTO-' . $cedula . '.' . $extension, true);
            $data['foto'] = 'uploads/fotoUser/FOTO-' . $cedula . '.' . $extension;
            if ($cedula == session('cedula')) {
                session()->set('foto', $data['foto']);
                session()->set('usuario', $data['nombre']);
            }
        }
        $this->doctorModel->update($id, $data);
        return redirect()->to(base_url('ad/doctor'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $doctor = $this->doctorModel->find($id);

        if ($doctor) {
            $nuevoEstado = ($doctor['estado'] == 0) ? 1 : 0;
            $data = ['estado' => $nuevoEstado];
            $this->doctorModel->update($id, $data);
        }
        return redirect()->to(base_url('ad/doctor'));
    }

    public function resetPass($id = null,$cedula = null)
    {

        $data = ['clave' => password_hash($cedula, PASSWORD_DEFAULT)];
        $this->doctorModel->update($id, $data);

        return redirect()->to(base_url('ad/doctor'));
    }

    public function newPass()
    {
        $cabecera = ['titulo' => 'Cambiar Contraseña', 'tipo' => 'Form'];
        return view('Admin/Form/PasswordNew', $cabecera);
    }
    public function changePass()
    {
        $reglas = [
            'password' => [
                'label' => 'Nueva Contraseña',
                'rules' => 'required|min_length[8]|max_length[16]|regex_match[/(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[@$!%*?&]).{8,16}/]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'min_length' => 'El campo {field} debe tener al menos 8 caracteres.',
                    'max_length' => 'El campo {field} no debe exceder los 16 caracteres.',
                    'regex_match' => 'El campo {field} debe contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial (@, $, !, %, *, ?, &).'
                ],
            ],
            'password2' => [
                'label' => 'Repetir Contraseña',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'Las contraseñas no coinciden.'
                ],
            ]
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $password = $this->request->getPost('password');
        $data = [
            'clave' => password_hash($password, PASSWORD_BCRYPT), 
        ];
        $this->doctorModel
            ->where('cedula', session('cedula')) 
            ->set($data) 
            ->update(); 

        return redirect()->to(base_url('ad/home'));
    }
}
