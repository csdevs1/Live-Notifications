<?php
    require_once('AppController.php');
    class NotificationController extends AppController {
        function insert_notification($vals) {
            $sql="INSERT INTO notifications (user_id) VALUES ($vals)";
            //$res = $sql;
            $res = $this->grabar($sql);
            if($res){
                return true;
            } else {
                return false;
            }
        }
    }

    $notification = new NotificationController();
    $response = $notification->insert_notification($_POST['id']);
    $json_response = array( 'response' => $response,
                            'user_id' => $_POST['id'],
                           'created_at' => '2016-07-28 20:55:15',
                            );
    echo json_encode($json_response);
?>