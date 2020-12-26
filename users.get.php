<?php
    header('Content-Type: application/json');
    require '../connect.php';

    $connect_to_jedi = mysqli_connect("localhost", "n1rwana", "7E7t7P3s", "bomj4544_jedi");

    $sql = "SELECT * FROM api_tokens WHERE token='".$_GET['access_token']."'";
    $que = mysqli_query($connect_to_jedi, $sql);
    $token_check = mysqli_fetch_assoc($que);

    if (!$_GET['access_token']) {
        $result = [
            'error'         => "access_token not entered"
        ];
        echo json_encode($result);
    } elseif (!$token_check) {
        $result = [
            'error'         => "token wasn't found in the db"
        ];
        echo json_encode($result);
    } else {

    if ($_GET['user']) {
        $sql = "SELECT * FROM users WHERE `number` = '".$_GET['user']."'";
        $query = mysqli_query($connect_to_jedi, $sql);
        $result = mysqli_fetch_assoc($query);

        if ($result['role'] == 0) {
            $result = [
                'id'            => $result['id'],
                'number'        => $result['number'],
                'avatar_link'   => $result['avatar_link'],
                'balance'       => $result['balance'],
                'banned'        => $result['banned'],
                'verified'      => $result['verified'],
                'vk'            => $result['vk']
            ];
            echo json_encode($result);
        } else {
            $result = [
                'id'            => $result['id'],
                'number'        => $result['number'],
                'verified'      => $result['verified']
            ];
            echo json_encode($result);
        }
    }
    
    if (!$_GET['user']) {
        $result = [
            'error'       => 'user not entered'
        ];
        echo json_encode($result);
    }
}
?>