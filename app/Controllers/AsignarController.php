<?php

namespace App\Controllers;

use App\Models\AsignarModel;
use App\Models\HorarioModel;
use App\Models\DoctorModel;


class AsignarController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $asignarModel;
    private $horarioModel;
    private $doctorModel;
    public function __construct()
    {
        $this->asignarModel = new AsignarModel();
        $this->horarioModel = new HorarioModel();
        $this->doctorModel = new DoctorModel();
    }


    public function index()
    {
        //
        $result = $this->asignarModel
            ->select('asignacion.*, doctores.nombre AS nombreDoctor, horarios.hora_inicio, horarios.hora_fin ')
            ->join('doctores', 'doctores.id = asignacion.id_doctor')
            ->join('horarios', 'horarios.id = asignacion.id_horario')
            ->findAll();
        $cabecera = ['titulo' => 'Nomina de Asignaciones', 'tipo' => 'Tabla', 'asignar' => $result];
        return view('Admin/Tablas/Asignar', $cabecera);
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
        $result = $this->doctorModel
            ->where('estado', 1)
            ->findAll();
        $result2 = $this->horarioModel
            ->where('estado', 1)
            ->findAll();
        $cabecera = ['titulo' => 'Registrar Asignación', 'tipo' => 'Form', 'doctor' => $result, 'horario' => $result2];
        return view('Admin/Form/AsignarNew', $cabecera);
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
                'doctor' => [
                    'label' => 'Doctor',
                    'rules' => 'required|greater_than[0]|is_not_unique[doctores.id]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un valor mayor a 0.',
                        'is_not_unique' => 'El {field} no exixte.'
                    ]
                ],
                'horario' => [
                    'label' => 'Horario',
                    'rules' => 'required|greater_than[0]|is_not_unique[horarios.id]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un valor mayor a 0.',
                        'is_not_unique' => 'El {field} no exixte.'
                    ]
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $doctor = $this->request->getPost('doctor');
        $horario = $this->request->getPost('horario');
        $estado = 1;

        $data = array(
            'id_doctor' => $doctor,
            'id_horario' => $horario,
            'estado' => $estado
        );

        $this->asignarModel->insert($data, false);
        return redirect()->to(base_url('ad/asignar'));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        $result = $this->asignarModel->find($id);
        $result2 = $this->doctorModel
            ->where('estado', 1)
            ->findAll();
        $result3 = $this->horarioModel
            ->where('estado', 1)
            ->findAll();
        $cabecera = ['titulo' => 'Actualizar Asignación', 'tipo' => 'Form', 'doctor' => $result2, 'horario' => $result3, 'asignar' => $result];
        return view('Admin/Form/AsignarEdit', $cabecera);
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
                'doctor' => [
                    'label' => 'Doctor',
                    'rules' => 'required|greater_than[0]|is_not_unique[doctores.id]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un valor mayor a 0.',
                        'is_not_unique' => 'El {field} no exixte.'
                    ]
                ],
                'horario' => [
                    'label' => 'Horario',
                    'rules' => 'required|greater_than[0]|is_not_unique[horarios.id]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un valor mayor a 0.',
                        'is_not_unique' => 'El {field} no exixte.'
                    ]
                ]
            ];
        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $doctor = $this->request->getPost('doctor');
        $horario = $this->request->getPost('horario');

        $data = array(
            'id_doctor' => $doctor,
            'id_horario' => $horario
        );

        $this->asignarModel->update($id, $data);
        return redirect()->to(base_url('ad/asignar'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $doctor = $this->asignarModel->find($id);

        if ($doctor) {
            $nuevoEstado = ($doctor['estado'] == 0) ? 1 : 0;
            $data = ['estado' => $nuevoEstado];
            $this->asignarModel->update($id, $data);
        }
        return redirect()->to(base_url('ad/asignar'));
    }
}
