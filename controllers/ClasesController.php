<?php
// ClaseController.php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Clase.php";

class ClaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ClaseModel();
    }

    public function index()
    {
        
        $clases = $this->model->all();
        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/clases/index.php";
    }

    public function create()
    {
        $maestroModel = new MaestroModel();
        $maestros = $maestroModel->all();
    
        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/clases/create.php";
    }

    public function store($request)
    {
        
        $this->model->create($request);
        header("Location: /clases");
    }

    public function edit($id)
    {
        // Muestra el formulario para editar una clase
        $clase = $this->model->find($id);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/admin/clases/edit.php";
    }

    public function update($request)
    {
        // Actualiza los datos de la clase en la base de datos
        $this->model->update($request);
        header("Location: /clases");
    }

    public function delete($id)
    {
        // Elimina una clase de la base de datos
        $this->model->destroy($id);
        header("Location: /clases");
    }
}
?>