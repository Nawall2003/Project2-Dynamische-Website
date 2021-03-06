<!doctype html>
<html lang="nl">

<head>
    <link rel="stylesheet" type="text/css" href="garagepaginas.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.telefoonboek.nl/bedrijf/logo/t3495775/rotterdam/garage-ertan/">
    <meta name="author" content="Matin Arja">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gar-delete-auto2.php</title>
</head>

<div>
<body>
    <h1>Delete Auto</h1>
    <p>Op auto gegevens zoeken uit de tabel auto van de database garage zodat ze verwijderd kunnen worden.</p>
    <div class="klantauto">
    <?php
            $autokenteken = $_POST["autokentekenvak"];

            require_once "gar-connect.php";

             $autos = $conn->prepare("
                                        select autokenteken,
                                               automerk,
                                               autotype,
                                               autokmstand,
                                               klantid
                                        from   auto
                                        where autokenteken = :autokenteken");
            $autos->execute(["autokenteken" => $autokenteken]);
        
                    echo "<table>";
                    echo "<tr>"; 
                    echo "<td>" . "ID" . "</td>";
                    echo "<td>" . "Type" . "</td>" ;
                    echo "<td>" . "Merk" . "</td>";
                    echo "<td>" . "Kilometerstand" . "</td>";
                    echo "<td>" . "Kenteken" . "</td>" . "<br/>";
                    echo "</tr>";

                foreach($autos as $auto)
                {
                    echo "<tr>";
                    echo "<td>" . $auto["klantid"] . "</td>";
                    echo "<td>" . $auto["autotype"] . "</td>";
                    echo "<td>" . $auto["automerk"] . "</td>";
                    echo "<td>" . $auto["autokmstand"] . "</td>";
                    echo "<td>" . $auto["autokenteken"] . "</td>";
                    echo "<tr>";
                }
                    echo "</table>";

                    echo "<form action='gar-delete-auto3.php' method='post'>";

                    echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";
                    echo "<br/><input type='hidden'name='verwijdervak' value='0'>";
                    echo "<input type='checkbox' name='verwijdervak' value='1'>";
                    echo "Verwijder deze auto.";
                    echo "<br/><br/><input type='submit'>";
                    echo "</form>";
        ?>
        </div>
</body>
</div>

</html>

