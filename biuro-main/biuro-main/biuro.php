<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <section id="left">
            <h2>Promocje</h2>
				<table>
					<tr>
						<td>Warszawa</td>
						<td>od 600 zł</td>
					</tr>
					<tr>
						<td>Wenecja</td>
						<td>od 1200 zł</td>
					</tr>
					<tr>
						<td>Paryż</td>
						<td>od 1200 zł</td>
					</tr>
				</table>
        </section>
        <section id="mid">
            <h2>W tym roku jedziemy do...</h2>
            <?php
            $connect = mysqli_connect('localhost', 'root', '', 'podroze');
            $zapytanie1 = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;";
            $res = mysqli_query($connect, $zapytanie1);
            while ($row = mysqli_fetch_array($res)) {
                echo "<img src='$row[0]' alt='$row[1]' title='$row[1]'>";
            }?>
        </section>
        <section id="right">
            <h2>Kontakt</h2>
            <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
            <p>telefon: 444555666</p>
        </section>
    </main>
    <section id="dane">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <?php

            $zapytanie2 = "SELECT cel, dataWyjazdu FROM wycieczki WHERE dostepna = 0;";
            $res = mysqli_query($connect, $zapytanie2);
            while ($row = mysqli_fetch_array($res)) {
                echo "<li>Dnia $row[1] pojechaliśmy do $row[0]</li>";
            }
            mysqli_close($connect);

            ?>
        </ol>
    </section>
    <footer>
        <p>Stronę wykonał: Michał Bolda</p>
    </footer>
</body>
</html>
