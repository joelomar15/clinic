<?php

namespace App\Controllers;

use App\Models\HorarioModel;

class HorarioController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $horarioModel;
    public function __construct()
    {
        $this->horarioModel = new HorarioModel();
    }


    public function index()
    {
        //
        $result = $this->horarioModel
            ->findAll();
        $cabecera = ['titulo' => 'Nomina de Horarios', 'tipo' => 'Tabla', 'horario' => $result];
        return view('Admin/Tablas/Horario', $cabecera);
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
        $cabecera = ['titulo' => 'Registrar Horario', 'tipo' => 'Form'];
        return view('Admin/Form/HorarioNew', $cabecera);
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
                'hora_inicio' => [
                    'label' => 'Hora de Inicio',
                    'rules' => 'required|regex_match[/^([0-1][0-9]|2[0-3]):[0-5][0-9]$/]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'regex_match' => 'El campo {field} debe tener un formato de hora válido (HH:mm).'
                    ],
                ],
                'hora_fin' => [
                    'label' => 'Hora de Fin',
                    'rules' => 'required|regex_match[/^([0-1][0-9]|2[0-3]):[0-5][0-9]$/]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'regex_match' => 'El campo {field} debe tener un formato de hora válido (HH:mm).'
                    ],
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $hora_fin = $this->request->getPost('hora_fin');
        $hora_inicio = $this->request->getPost('hora_inicio');
        $estado = 1;

        $data = array(
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin,
            'estado' => $estado
        );

        $this->horarioModel->insert($data, false);
        return redirect()->to(base_url('ad/horario'));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        $result = $this->horarioModel->find($id);
        $cabecera = ['titulo' => 'Actualizar Horario', 'tipo' => 'Form', 'horario' => $result];
        return view('Admin/Form/HorarioEdit', $cabecera);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
        $reglas =
        [
            'hora_inicio' => [
                'label' => 'Hora de Inicio',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ],
            'hora_fin' => [
                'label' => 'Hora de Fin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ],
            ]
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $hora_fin = $this->request->getPost('hora_fin');
        $hora_inicio = $this->request->getPost('hora_inicio');

        $data = array(
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin
        );


        $this->horarioModel->update($id, $data);
        return redirect()->to(base_url('ad/horario'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $doctor = $this->horarioModel->find($id);

        if ($doctor) {
            $nuevoEstado = ($doctor['estado'] == 0) ? 1 : 0;
            $data = ['estado' => $nuevoEstado];
            $this->horarioModel->update($id, $data);
        }
        return redirect()->to(base_url('ad/horario'));
    }
}
