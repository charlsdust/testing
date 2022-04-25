<?php

$polaczenie = new mysqli('us-cdbr-east-05.cleardb.net', 'b2196f371d5b46', 'f43115db', 'heroku_794dc178545b693');

if (mysqli_connect_errno() != 0) {
    echo 'blad polaczenia z baza: ' . mysqli_connect_error();
    exit;
}

$sql = 'select * from studenci';

$wynik = $polaczenie->query($sql);
echo '<table border><th>ID<th>Nazwisko<th>Imie<th>Data urodzenia<th>liczba dzieci';
while (($rekord = $wynik->fetch_assoc()) != null) {
    echo '<tr>';
    echo '<td>' . $rekord['id_studenta'];
    echo '<td>' . $rekord['nazwisko'];
    echo '<td>' . $rekord['imie'];
    echo '<td>' . $rekord['data_urodzenia'];
    echo '<td>' . $rekord['liczba_dzieci'];
    echo "<td><a href=delete.php?ids=$rekord[id_studenta]> Usun</a>";
    echo "<td><a href=update_form.php?ids=$rekord[id_studenta]> Edycja</a>";
}

echo '</table>';
echo 'Liczba rekordow: ' . $wynik->num_rows;
