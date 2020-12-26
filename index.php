<?php
    /*if (!$_GET['method']) {
        exit("Отсутствует параметр: method");
    } elseif ($_GET['method'] == 'users.get') {
        if (!$_GET['access_token']) {
            exit("Отсутствует параметр: access_token");
        } elseif ($_GET['access_token'] != 'a741ef1aa741ef1aa741ef1a91a72a911daa741a741ef1afae12380cafc3225fdb427e4') {
            exit("Параметр неверен: access_token");
        } elseif (!$_GET['user']) {
            exit("Отсутствует параметр: user");
        } else {
            $request_params = array( 
                'access_token' => $_GET['access_token'],
                'user'         => $_GET['user']
                );
                $get_params = http_build_query($request_params);
                $result = json_decode(file_get_contents('http://idkn.site/jediapi/methods/users.get.php?'. $get_params)); 
               
$user_id = $result -> id;
                $user_number = $result -> number;
                $user_avatar_link = $result -> avatar_link;
                $user_ip = $result -> ip;
                $user_role = $result -> role;
                $user_balance = $result -> balance;
                $user_banned = $result -> banned;
                $user_ban_reason = $result -> ban_reason;
                $user_verified = $result -> verified;
                $user_vk = $result -> vk;
                
                switch ($user_role) {
                    case '0':
                        $role = "Агент Поддержки";
                        break;
                    case '1':
                        $role = "Специальный агент";
                        break;
                    case '2':
                        $role = "Администратор";
                        break;
                    case '3':
                        $role = "Главный спец. агент";
                        break;
                    case '4':
                        $role = "Главный администратор";
                        break;
                    case '5':
                        $role = "Меркурий";
                        break;                    
                    default:
                        $role = "Неизвестно";
                        break;
                }

                if ($user_banned == '1') {
                    $banned = 'Да';
                } else {
                    $banned = 'Нет';
                }

                if ($user_banned == '0') {
                    $reason = 'Не забанен';
                } elseif ($user_ban_reason == 0) {
                    $reason = 'Не указана';
                }

                if ($user_verified == '1') {
                    $verified = 'Да';
                } else {
                    $verified = 'Нет';
                }

                echo "<b>users.get</b>: результат";
                echo "<ul>";
                echo "<li>ID: ".$user_id."</li>";
                echo "<li>Номер: ".$user_number."</li>";
                echo "<li>Ссылка на аватар: <a href='".$user_avatar_link."' target='_blank'>...</li>";
                echo "<li>IP: ".$user_ip."</li>";
                echo "<li>Роль: ".$role."</li>";
                echo "<li>Баланс: ".$user_balance."</li>";
                echo "<li>Забанен: ".$banned."</li>";
                echo "<li>Причина бана: ".$reason."</li>";
                echo "<li>Верифицирован: ".$verified."</li>";
                echo "<li>Страница VK: <a href='https://vk.com/id".$user_vk."' target='_blank'>...</a></li>";
                
                echo "</ul>";
        }
    }*/
?>