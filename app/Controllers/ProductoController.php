<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ProductoController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $productoModel;
    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }


    public function index()
    {
        //
        $result = $this->productoModel
            ->findAll();
        $cabecera = ['titulo' => 'Nomina de Producto', 'tipo' => 'Tabla', 'producto' => $result];
        return view('Admin/Tablas/Producto', $cabecera);
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
        $cabecera = ['titulo' => 'Registrar Producto', 'tipo' => 'Form'];
        return view('Admin/Form/ProductoNew', $cabecera);
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
                'valor' => [
                    'label' => 'Precio',
                    'rules' => 'required|greater_than_equal_to[0]|decimal',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than_equal_to' => 'El campo {field} debe ser mayor o igual a 0.',
                        'decimal' => 'El campo {field} debe ser un número válido (puede ser decimal).',
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
        $descripcion = $this->request->getPost('descripcion');
        if (empty($descripcion)) {
            $descripcion = 'Ninguna';
        }
        $valor = $this->request->getPost('valor');
        $estado = 1;
        $archivoNombre = strtoupper(str_replace(' ', '', $nombre));

        $mi_archivo = $this->request->getFile('foto');
        if ($mi_archivo->isValid()) {
            $extension = $mi_archivo->getExtension();
            $mi_archivo->move(WRITEPATH . 'uploads/producto/', 'PRO-' . $archivoNombre . '.' . $extension, true);
        }

        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'valor' => $valor,
            'estado' => $estado,
            'foto' => 'uploads/producto/PRO-' . $archivoNombre . '.' . $extension
        );

        $this->productoModel->insert($data, false);
        return redirect()->to(base_url('ad/producto'));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        $result = $this->productoModel->find($id);
        $cabecera = ['titulo' => 'Actualizar Producto', 'tipo' => 'Form', 'producto' => $result];
        return view('Admin/Form/ProductoEdit', $cabecera);
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
                'valor' => [
                    'label' => 'Precio',
                    'rules' => 'required|greater_than_equal_to[0]|decimal',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'greater_than_equal_to' => 'El campo {field} debe ser mayor o igual a 0.',
                        'decimal' => 'El campo {field} debe ser un número válido (puede ser decimal).',
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
        $descripcion = $this->request->getPost('descripcion');
        if (empty($descripcion)) {
            $descripcion = 'Ninguna';
        }
        $valor = $this->request->getPost('valor');
        $estado = 1;
        $archivoNombre = strtoupper(str_replace(' ', '', $nombre));

        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'valor' => $valor,
            'estado' => $estado
        );

        $mi_archivo = $this->request->getFile(fileID: 'foto');
        if ($mi_archivo->isValid()) {
            $uploadPath = WRITEPATH . 'uploads/producto/';
            $fileNamePattern = $uploadPath . 'PRO-' . $archivoNombre . '.*'; // Busca cualquier extensión

            // Eliminar cualquier archivo que coincida con el patrón
            foreach (glob($fileNamePattern) as $oldFile) {
                unlink($oldFile); // Eliminar archivo
            }

            $extension = $mi_archivo->getExtension();
            $mi_archivo->move(WRITEPATH . 'uploads/producto/', 'PRO-' . $archivoNombre . '.' . $extension, true);
            $data['foto'] = 'uploads/producto/PRO-' . $archivoNombre . '.' . $extension;
        }

        $this->productoModel->update($id, $data);
        return redirect()->to(base_url('ad/producto'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $doctor = $this->productoModel->find($id);

        if ($doctor) {
            $nuevoEstado = ($doctor['estado'] == 0) ? 1 : 0;
            $data = ['estado' => $nuevoEstado];
            $this->productoModel->update($id, $data);
        }
        return redirect()->to(base_url('ad/producto'));
    }
}
