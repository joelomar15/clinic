<?php

namespace App\Controllers;

use App\Models\ClienteModel;

class ClienteController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $clienteModel;
    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
    }


    public function index()
    {
        //
        $result = $this->clienteModel
            ->findAll();
        $cabecera = ['titulo' => 'Nomina de Clientes', 'tipo' => 'Tabla', 'cliente' => $result];
        return view('Admin/Tablas/Cliente', $cabecera);
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
        $cabecera = ['titulo' => 'Registrar Cliente', 'tipo' => 'Form'];
        return view('Admin/Form/ClienteNew', $cabecera);
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
        return view('Modal/modalEmpleado.php', $cabecera);
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
                    'rules' => 'required|greater_than[0]|is_unique[clientes.cedula]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener solo números',
                        'is_unique' => 'La cédula del Cliente ya existe...'
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
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getPost('nombre');
        $cedula = $this->request->getPost('cedula');
        $email = $this->request->getPost('email');
        $telefono = $this->request->getPost('telefono');
        $estado = 1;

        $data = array(
            'nombre' => $nombre,
            'cedula' => $cedula,
            'correo' => $email,
            'telefono' => $telefono,
            'estado' => $estado,
            'clave' => password_hash($cedula, PASSWORD_DEFAULT)
        );

        $this->clienteModel->insert($data, false);
        return redirect()->to(base_url('ad/cliente'));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        $result = $this->clienteModel->find($id);
        $cabecera = ['titulo' => 'Actualizar Cliente', 'tipo' => 'Form', 'cliente' => $result];
        return view('Admin/Form/ClienteEdit', $cabecera);
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
                        'is_unique' => 'La cédula del Cliente ya existe...'
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
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getPost('nombre');
        $cedula = $this->request->getPost('cedula');
        $email = $this->request->getPost('email');
        $telefono = $this->request->getPost('telefono');

        $data = array(
            'nombre' => $nombre,
            'cedula' => $cedula,
            'correo' => $email,
            'telefono' => $telefono,
        );

        $this->clienteModel->update($id, $data);
        return redirect()->to(base_url('ad/cliente'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $doctor = $this->clienteModel->find($id);

        if ($doctor) {
            $nuevoEstado = ($doctor['estado'] == 0) ? 1 : 0;
            $data = ['estado' => $nuevoEstado];
            $this->clienteModel->update($id, $data);
        }
        return redirect()->to(base_url('ad/cliente'));
    }
}
