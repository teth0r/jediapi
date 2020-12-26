<?php
    header('Content-Type: application/json');
    require '../connect.php';

    $connect_to_jedi = mysqli_connect("localhost", "n1rwana", "7E7t7P3s", "bomj4544_jedi");

    $sql = "SELECT * FROM api_tokens WHERE token='".$_GET['access_token']."'";
    $que = mysqli_query($connect_to_jedi, $sql);
    $token_check = mysqli_fetch_assoc($que);

    $sql = "SELECT * FROM users WHERE `vk`='".$token_check['vk']."'";
    $que = mysqli_query($connect_to_jedi, $sql);
    $us = mysqli_fetch_assoc($que);

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

    if ($_GET['id']) {
        $sql = "SELECT * FROM questions WHERE `ticket_id` = '".$_GET['id']."'";
        $query = mysqli_query($connect_to_jedi, $sql);
        $result = mysqli_fetch_assoc($query);

        if ($us['number'] != $result['agent_for']) {
            $result = [
                'error'       => "it's not for you :)"
            ];
            echo json_encode($result);
        } else {
            $result = [
                'id'               => $result['id'],
                'ticket_id'        => $result['ticket_id'],
                "ticket"           => [
                    'title'            => $result['title'],
                    'description'      => $result['description'],
                ],
                "user_inf"         => [
                    'author_id'        => $result['author'],
                    'agent_for'        => $result['agent_for']
                ]
            ];
            echo json_encode($result);
        }
    }
    
    if (!$_GET['id']) {
        $result = [
            'error'       => 'id not entered'
        ];
        echo json_encode($result);
    }
}
?>