<?php
$rows = $fgmembersite->getEntireDatabase();
foreach ($rows as $row) {
    if ($row['role'] == 'Administrator')
        $class_name = "success";
    else
        $class_name = "warning";
    ?>
    <tr class="<?php echo($class_name) ?>">
        <td><?php echo($row['name']) ?></td>
        <td><?php echo($row['email']) ?></td>
        <td><?php echo($row['university']) ?></td>
        <td><?php echo($row['username']) ?></td>
        <td><?php echo($row['role']) ?></td>
    </tr>
    <?php
}
?>