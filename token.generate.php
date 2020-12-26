<?php
    header('Content-Type: application/json');
    require '../connect.php';

    function gen_token() {
        $bytes = openssl_random_pseudo_bytes(20, $cstrong);
        return bin2hex($bytes); 
    }

    if (!$_GET['vk']) {
        $result = [
            'error'                    => 'vk not entered'
        ];
        echo json_encode($result);
    } elseif ($_GET['vk'] < 0 || !is_numeric($_GET['vk'])) {
        $result = [
            'error'                    => 'vk is wrong or not numeric'
        ];
        echo json_encode($result);
    } else {
        $connect_to_jedi = mysqli_connect("localhost", "n1rwana", "7E7t7P3s", "bomj4544_jedi");

        $sql = "SELECT * FROM users WHERE vk = '".$_GET['vk']."'";
        $que = mysqli_query($connect_to_jedi, $sql);
        $vkcheck = mysqli_fetch_assoc($que);

        if (!$vkcheck) {
            $result = [
                'error'                   => "user with this vk wasn't found in the JEDI db. register in the app first"
            ];
            echo json_encode($result);
        } else {
            $connect_to_jedi = mysqli_connect("localhost", "n1rwana", "7E7t7P3s", "bomj4544_jedi");

            $sql = "SELECT * FROM api_tokens WHERE vk = '".$_GET['vk']."'";
            $que = mysqli_query($connect_to_jedi, $sql);
            $tokencheck = mysqli_fetch_assoc($que);
            if ($tokencheck) {
                $result = [
                    'error'                => "token for this vk already exists in db"
                ];
                echo json_encode($result);
            } else {
                $connect_to_jedi = mysqli_connect("localhost", "n1rwana", "7E7t7P3s", "bomj4544_jedi");

                $sql = "SELECT number FROM users WHERE vk = '".$_GET['vk']."'";
                $que = mysqli_query($connect_to_jedi, $sql);
                $num = mysqli_fetch_assoc($que);

                $number = $num['number'];
                $token = gen_token();

                $sql = "INSERT INTO api_tokens (`id`,`vk`,`number`,`permissions`,`token`,`generation_date`) VALUES ('', '".$_GET['vk']."', '".$number."', 'public', '".$token."', '".time()."')";
                $que = mysqli_query($connect_to_jedi, $sql);

                $result = [
                    'response'             => "ВНИМАНИЕ! ВЫ МОЖЕТЕ УВИДЕТЬ ТОКЕН ТОЛЬКО СЕЙЧАС! СОХРАНИТЕ ЕГО",
                    'access_token'         => $token
                ];
                echo json_encode($result);
            }
        }
    } 
?>