<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysqli;

class RespaldoController extends Controller
{
    public function index(Request $request){
        return view('respaldo.index');
    }

    /*Función que permite realizar el respaldo de la base de datos */
    public function respaldo($host,$user,$pass,$name,$tables){
        $return='';
        $link = new mysqli($host,$user,$pass,$name);
        if($tables == '*'){
            $tables = array();
            $result = $link->query('SHOW TABLES');
            while($row = mysqli_fetch_row($result)){
                $tables[] = $row[0];
            }
        }else{
            $tables = is_array($tables) ? $tables : explode(',',$tables);
        }

        foreach($tables as $table){
            $result = $link->query('SELECT * FROM '.$table);
            $num_fields = mysqli_num_fields($result);
            //$return.= 'DROP TABLE '.$table.';';
            $row2 = mysqli_fetch_row($link->query('SHOW CREATE TABLE '.$table));
            $return.= "\n\n".$row2[1].";\n\n";
            for ($i = 0; $i < $num_fields; $i++){
                while($row = mysqli_fetch_row($result)){
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                    for($j=0; $j<$num_fields; $j++){
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = preg_replace("/\n/","\\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                            if ($j<($num_fields-1)) { $return.= ','; }
                    }
                    $return.= ");\n";
                }
            }
            $return.="\n\n\n";
        }
        $fecha=date("Y-m-d");
        $filename = ('dbakk-'.$fecha.'.sql');
        $handle = fopen($filename,'w+');
        fwrite($handle,$return);
        fclose($handle);
    }

    /*Función que permite realizar el respaldo toda la base de datos */
    public function generar_respaldo(){
        $this->respaldo('127.0.0.1','root','','dbakk','*');
        $fecha=date("Y-m-d");
        header("Content-disposition: attachment; filename=dbakk-".$fecha.".sql");
        header("Content-type: MIME");
        readfile("dbakk-".$fecha.".sql");
        unlink("dbakk-".$fecha.".sql");
    }


public function getTmp(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if file was uploaded without errors
            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $url = $_FILES["file"]["tmp_name"];
            }
        }   return $url;
    }

    public function restaurar(){
        $conn = mysqli_connect("127.0.0.1", "root", "", "dbakk");
        $path = public_path().'/backups/';
        $filePath = $this->getTmp();
        //$filePath = $path.$request->file;
        function restoreMysqlDB($filePath, $conn){
            $sql = '';
            $error = '';
            if (file_exists($filePath)) {
                $lines = file($filePath);

                foreach ($lines as $line) {

                    // Ignoring comments from the SQL script
                    if (substr($line, 0, 2) == '--' || $line == '') {
                        continue;
                    }

                    $sql .= $line;

                    if (substr(trim($line), - 1, 1) == ';') {
                        $result = mysqli_query($conn, $sql);
                        if (! $result) {
                            $error .= mysqli_error($conn) . "\n";
                        }
                        $sql = '';
                    }
                } // end foreach
                
            } // end if file exists

        }
        restoreMysqlDB($filePath,$conn);
        return redirect('backup')->with('alerta','Resturación realizada correctamente');
    }
}
