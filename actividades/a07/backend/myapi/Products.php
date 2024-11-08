<?php
    namespace TECWEB\MYAPI;
    use TECWEB\MYAPI\DataBase as DataBase;
    require_once __DIR__ . '/DataBase.php';
    
    class Products extends DataBase{
        private $data = NULL;

        public function __construct($db, $user = 'root', $pass = 'mamarre123'){
            $this->data = array();
            parent::__construct($db, $user, $pass);
        }

        public function add($producto){
            $this->data = array(
                'status'  => 'error',
                'message' => 'Ya existe un producto con ese nombre'
            );
            if(!empty($producto)) {
                $sql = "SELECT * FROM productos WHERE nombre = '{$producto->nombre}' AND eliminado = 0";
                $result = $this->conexion->query($sql);
                
                if ($result->num_rows == 0) {
                    $this->conexion->set_charset("utf8");
                    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
                            VALUES ('{$producto->nombre}', '{$producto->marca}', '{$producto->modelo}', {$producto->precio}, 
                                    '{$producto->detalles}', {$producto->unidades}, '{$producto->imagen}')";
                    if($this->conexion->query($sql)){
                        $this->data['status'] =  "success";
                        $this->data['message'] =  "Producto agregado";
                    } else {
                        $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                    }
                }
        
                $result->free();
            }
        }

        public function delete($id){
            $this->data = array(
                'status'  => 'error',
                'message' => 'La consulta falló'
            );
            if( isset($id) ) {
                $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";
                if ( $this->conexion->query($sql) ) {
                    $this->data['status'] =  "success";
                    $this->data['message'] =  "Producto eliminado";
                } else {
                    $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            }
        }

        public function edit($producto){
            $this->data = array(
                'status'  => 'error',
                'message' => 'Ya existe un producto con ese nombre'
            );
            if(!empty($producto)) {
                $sql = "SELECT * FROM productos WHERE nombre = '{$producto->nombre}' AND eliminado = 0 AND id != '{$producto->id}'";
                $result = $this->conexion->query($sql);
                
                if ($result->num_rows == 0) {
                    $this->conexion->set_charset("utf8");
                    $sql = "UPDATE productos SET nombre = '{$producto->nombre}', marca = '{$producto->marca}', modelo = '{$producto->modelo}', 
                            precio = {$producto->precio}, detalles = '{$producto->detalles}', unidades = {$producto->unidades}, imagen = '{$producto->imagen}' 
                            WHERE id = '{$producto->id}'";
                    if($this->conexion->query($sql)){
                        $this->data['status'] =  "success";
                        $this->data['message'] =  "Producto editado";
                    } else {
                        $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                    }
                }
        
                $result->free();
            }
        }

        public function list(){
            if ( $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0") ) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
            
                if(!is_null($rows)) {
                    foreach($rows as $num => $row) {
                        foreach($row as $key => $value) {
                            $this->data[$num][$key] = $value;
                        }
                    }
                }
                $result->free();
            } else {
                die('Query Error: '.mysqli_error($this->conexion));
            }
        }

        public function search($search){
            if( isset($search) ) {
                $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
                if ( $result = $this->conexion->query($sql) ) {
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
        
                    if(!is_null($rows)) {
                        foreach($rows as $num => $row) {
                            foreach($row as $key => $value) {
                                $this->data[$num][$key] = $value;
                            }
                        }
                    }
                    
                    $result->free();
                } else {
                    die('Query Error: '.mysqli_error($this->conexion));
                }
            }
        }

        public function single($id){
            $id = $_POST['id'];
        
            $query = "SELECT * FROM productos WHERE id = {$id}";
            $result = mysqli_query($this->conexion, $query);

            if($this->conexion->query($query)){
                while($row = mysqli_fetch_array($result)){
                    $this->data = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'precio' => $row['precio'],
                        'unidades' => $row['unidades'],
                        'modelo' => $row['modelo'],
                        'marca' => $row['marca'],
                        'detalles' => $row['detalles'],
                        'imagen' => $row['imagen']
                    );
                }
            }
            else{
                die('Query Error: '.mysqli_error($this->conexion));
            }
        }

        public function singleByName($name){
            $name = $_POST['name'];
        
            $query = "SELECT * FROM productos WHERE nombre = {$name}";
            $result = mysqli_query($this->conexion, $query);

            if($this->conexion->query($query)){
                while($row = mysqli_fetch_array($result)){
                    $this->data = array(
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'precio' => $row['precio'],
                        'unidades' => $row['unidades'],
                        'modelo' => $row['modelo'],
                        'marca' => $row['marca'],
                        'detalles' => $row['detalles'],
                        'imagen' => $row['imagen']
                    );
                }
            }
            else{
                die('Query Error: '.mysqli_error($this->conexion));
            }
        }

        public function getData(){
            return json_encode($this->data, JSON_PRETTY_PRINT);
        }
    }
?>
