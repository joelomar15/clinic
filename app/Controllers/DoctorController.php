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
        return view('Admin/Tablas/doctor', $cabecera);
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
        return view('Admin/Form/DoctorNew.php', $cabecera);
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
            'clave' => password_hash($cedula,PASSWORD_DEFAULT),
            'foto' => 'uploads/fotoUser/FOTO-' . $cedula . '.' . $extension
        );

        $this->doctorModel->insert($data, false);
        return redirect()->to(base_url('/ad/doctor'));
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
        $cabecera = ['titulo' => 'Actualizar Empleados', 'tipo' => 'Form', 'empleado' => $result];
        return view('Form/EmpleadoEdit', $cabecera);
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
                    'label' => 'Usuario',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ],
                'apellido' => [
                    'label' => 'Apellidop',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ],
                'cedula' => [
                    'label' => 'Cédula',
                    'rules' => 'required|greater_than[0]|is_unique[empleados.cedula,idEmpleado,' . $id . ']',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener solo números',
                        'is_unique' => 'La cédula del Empleado ya existe...'
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
                'edad' => [
                    'label' => 'Edad',
                    'rules' => 'required|greater_than[0]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un número mayor a 0'
                    ],
                ],
                'fechaNaci' => [
                    'label' => 'F. Nacimiento',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ],
                ],
                'salario' => [
                    'label' => 'Salario',
                    'rules' => 'required|greater_than[0]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un número mayor a 0'
                    ],
                ],
                'cv' => [
                    'label' => 'Curriculo Vitae',
                    'rules' => 'mime_in[cv,application/pdf]|max_size[cv,10000]',
                    'errors' => [
                        'mime_in' => 'Por favor, carga un archivo en formato PDF',
                        'max_size' => 'El tamaño maximo del archivo debe de ser 50 MB'
                    ]
                ],
                'areas' => [
                    'label' => 'Área',
                    'rules' => 'required|greater_than[0]|is_not_unique[areas.idArea]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un valor mayor a 0.',
                        'is_not_unique' => 'El id no exixte.'
                    ]
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $nombre = $this->request->getPost('nombre');
        $apellido = $this->request->getPost('apellido');
        $cedula = $this->request->getPost('cedula');
        $direccion = $this->request->getPost('direccion');
        $email = $this->request->getPost('email');
        $edad = $this->request->getPost('edad');
        $fechaNaci = $this->request->getPost('fechaNaci');
        $salario = $this->request->getPost('salario');
        $estado = $this->request->getPost('estado');
        $area = $this->request->getPost('areas');
        if ($estado != 1) {
            $estado = 0;
        }


        $data = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'cedula' => $cedula,
            'direccion' => $direccion,
            'edad' => $edad,
            'fechaNaci' => $fechaNaci,
            'salario' => $salario,
            'estado' => $estado,
            'idArea' => $area,
            'email' => $email
        );

        $mi_archivo = $this->request->getFile('cv');
        if ($mi_archivo->isValid()) {
            $mi_archivo->move(WRITEPATH . 'uploads/CVEmpleados/', 'CV-' . $cedula . '.pdf', true);
            $data['cv'] = 'uploads/CVEmpleados/CV-' . $cedula . '.pdf';
        }

        $this->doctorModel->update($id, $data);
        return redirect()->to(base_url('/empleados'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $data = array(
            'estado' => 0
        );
        $this->doctorModel->update($id, $data);
        return redirect()->to(base_url('/empleados'));
    }
}
