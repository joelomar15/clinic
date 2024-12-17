<?php

namespace App\Controllers;

use App\Models\OfertaModel;
use App\Models\ProductoModel;

class OfertaController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $ofertaModel;
    private $productoModel;
    public function __construct()
    {
        $this->ofertaModel = new OfertaModel();
        $this->productoModel = new ProductoModel();
    }


    public function index()
    {
        //
        $result = $this->ofertaModel
            ->select('ofertas.*, productos.nombre AS nombreProducto, productos.valor AS precioProducto')
            ->join('productos', 'productos.id = ofertas.id_producto')
            ->findAll();
        $cabecera = ['titulo' => 'Nomina de Ofertas', 'tipo' => 'Tabla', 'oferta' => $result];
        return view('Admin/Tablas/Oferta', $cabecera);
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
        $result = $this->productoModel
            ->where('estado', 1)
            ->findAll();
        $cabecera = ['titulo' => 'Registrar Oferta', 'tipo' => 'Form', 'producto' => $result];
        return view('Admin/Form/OfertaNew', $cabecera);
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
                'producto' => [
                    'label' => 'Producto',
                    'rules' => 'required|greater_than[0]|is_not_unique[productos.id]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un valor mayor a 0.',
                        'is_not_unique' => 'El Producto no exixte.'
                    ]
                ],
                'porcentaje' => [
                    'label' => 'Porcentaje',
                    'rules' => 'required|greater_than_equal_to[0]|decimal',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than_equal_to' => 'El campo {field} debe ser mayor o igual a 0.',
                        'decimal' => 'El campo {field} debe ser un número válido (puede ser decimal).',
                    ],
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $producto = $this->request->getPost('producto');
        $porcentaje = $this->request->getPost('porcentaje');
        $descripcion = $this->request->getPost('descripcion');
        $estado = 1;

        $data = array(
            'id_producto' => $producto,
            'porcentaje' => $porcentaje,
            'descripcion' => $descripcion,
            'estado' => $estado
        );

        $this->ofertaModel->insert($data, false);
        return redirect()->to(base_url('ad/oferta'));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        $result2 = $this->productoModel
            ->where('estado', 1)
            ->findAll();
        $result = $this->ofertaModel->find($id);
        $cabecera = ['titulo' => 'Actualizar Oferta', 'tipo' => 'Form', 'producto' => $result2, 'oferta' => $result];
        return view('Admin/Form/OfertaEdit', $cabecera);
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
                'producto' => [
                    'label' => 'Producto',
                    'rules' => 'required|greater_than[0]|is_not_unique[productos.id]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than' => 'El campo {field} debe contener un valor mayor a 0.',
                        'is_not_unique' => 'El Producto no exixte.'
                    ]
                ],
                'porcentaje' => [
                    'label' => 'Porcentaje',
                    'rules' => 'required|greater_than_equal_to[0]|decimal',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than_equal_to' => 'El campo {field} debe ser mayor o igual a 0.',
                        'decimal' => 'El campo {field} debe ser un número válido (puede ser decimal).',
                    ],
                ]
            ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

        $producto = $this->request->getPost('producto');
        $porcentaje = $this->request->getPost('porcentaje');
        $descripcion = $this->request->getPost('descripcion');

        $data = array(
            'id_producto' => $producto,
            'porcentaje' => $porcentaje,
            'descripcion' => $descripcion
        );

        $this->ofertaModel->update($id, $data);
        return redirect()->to(base_url('ad/oferta'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $doctor = $this->ofertaModel->find($id);

        if ($doctor) {
            $nuevoEstado = ($doctor['estado'] == 0) ? 1 : 0;
            $data = ['estado' => $nuevoEstado];
            $this->ofertaModel->update($id, $data);
        }
        return redirect()->to(base_url('ad/oferta'));
    }
}
