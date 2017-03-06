<?php

$mysqli = new mysqli('localhost', 'root', 'mysql', 'testdb');

if (mysqli_connect_errno()) {
    echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
    exit;
}

$page = isset($_GET['p']) ? $_GET['p'] : '';

if ($page == 'view') {
    $result = $mysqli->query("SELECT * FROM fgusers3 WHERE DELETED !='1' ORDER BY role DESC");
    while ($row = $result->fetch_assoc()) {
        $class = "";
        if($row['role'] == 'Administrator'){
            $class = "danger";
        }
        else if($row['role'] == 'Member'){
            $class = "success";
        }
        else if($row['role'] == 'Member'){
            $class = "warning";
        }
        else{
            $class = "active";
        }
        ?>
        <tr>
            <td><?php echo($row['id_user']) ?></td>
            <td><?php echo($row['name']) ?></td>
            <td><?php echo($row['email']) ?></td>
            <td><?php echo($row['university']) ?></td>
            <td><?php echo($row['username']) ?></td>
            <td><?php echo($row['role']) ?></td>
        </tr>
        <?php
    }
} else {
    header('Content-Type: application/json');
    $input = filter_input_array(INPUT_POST);

    if ($input['action'] == 'edit') {
        $query_stmt = "UPDATE `fgusers3` SET `name`='" . $input['name'] . "',`email`='" . $input['email'] . "',`university`='" . $input['university'] . "',`username`='" . $input['username'] . "',`role`='" . $input['role'] . "' WHERE `id_user`= '" . $input['id_user'] . "'";
        $query_stmt = "UPDATE fgusers3 SET name='" . $input['name'] . "', email='" . $input['email'] . "', university='" . $input['university'] . "', username='" . $input['username'] . "', role='" . $input['role'] . "' WHERE id_user= '" . $input['id_user'] . "'";

        $mysqli->query($query_stmt);
    } else if ($input['action'] == 'delete') {
        $mysqli->query("UPDATE fgusers3 SET deleted=1 WHERE id_user='" . $input['id_user'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE fgusers3 SET deleted=0 WHERE id_user='" . $input['id_user'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);
}