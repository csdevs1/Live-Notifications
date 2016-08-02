<?php
    require_once('AppController.php');
    class UserController extends AppController {
        public function listUsers($id) {
            $sql="SELECT * FROM users WHERE id='$id';";
            $res=$this->consulta_sql($sql);
            $lista=array();
            while($row=mysql_fetch_assoc($res)) {
                $lista[]=$row;
            }
            return $lista;
        }
        public function getNotifications($user_id) {
            $sql="SELECT * FROM notifications WHERE user_id='$user_id';";
            $res=$this->consulta_sql($sql);
            $lista=array();
            while($row=mysql_fetch_assoc($res)) {
                $lista[]=$row;
            }
            return $lista;
        }
        
        function grabar($sql){
            if($this->con->conectar()==true){
                mysql_query($sql);
            }
        }  
    }

    $_SESSION['id'] = 3;
    
    $users = new UserController();
    $json_response = array('users'=>$users->listUsers($_SESSION['id']), 'notifications'=> $users->getNotifications($_SESSION['id']));
    echo json_encode($json_response);
?>