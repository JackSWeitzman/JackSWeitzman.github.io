<?php
 $username = "sql8660698";
 $password = "dIewP8bnAd";
 $host = "sql8.freesqldatabase.com";
 $dbname = "sql8660698";
 $connector = mysqli_connect($host, $username, $password, $dbname)
    or die("Unable to connect");
 ?>
 <!DOCTYPE html>
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link href="style/index-layout.css" rel="stylesheet" type="text/css" />
    <link href="style/homepage-layout.css" rel="stylesheet" type="text/css"/>
 </head>
 <body>
    <div id="body">
        <div id="left">
        </div></div>
    <?php
    $result = mysqli_query($connector, "SELECT * FROM items ORDER BY equipped_slot DESC, cost ASC, item_name ASC");
    ?>
    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Equipped Slot</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo
                "<tr>
          <td>{$row['item_name']}</td>
          <td>{$row['equipped_slot']} </td>
          <td>{$row['cost']}</td>
          
        </tr>";
            }
            ?>
        </tbody>
    </table>
 </body>
 </html>
<?php mysqli_close($connector); ?>