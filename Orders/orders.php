<?php
//read csv file
$csv = array_map('str_getcsv', file('phppractise.csv'));
?>

<table>
    <tr>
        <th>Date</th>
        <th>Region</th>
        <th>Name</th>
        <th>Product</th>
    </tr>
    <?php foreach ($csv as $row): ?>
        <tr>
            <?php foreach ($row as $cell): ?>
                <td><?php echo $cell; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
