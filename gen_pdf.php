<?php
    require('tfpdf/tfpdf.php');

    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "b830edd17e2659", "4e8638b1", "heroku_c54231ad1b217de");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $pdf = new tFPDF();
    $pdf->AddFont('PDFFont','','comici.ttf');
    $pdf->SetFont('PDFFont','',12);
    $pdf->AddPage();

    $pdf->Cell(80);
    $pdf->Cell(30,10,'Киносеансы',1,0,'C');
    $pdf->Ln(20);

    $pdf->SetFillColor(200,200,200);
    $pdf->SetFontSize(6);

    $header = array("п/п","Название фильма","Жанр","Год выпуска","Название зала","Категория","Начало показа","Количество свободных мест");
    $w = array(6,40,23,18,25,20,25,31);
    $h = 10;
    for ($c = 0; $c < 8; $c++){
        $pdf->Cell($w[$c],$h,$header[$c],'LRTB','0','',true);
    }
    $pdf->Ln();

    $result = $mysqli->query("SELECT
        films.name as film,
        films.genre as genre,
        films.release_date,

        rooms.name as room,
        rooms.category as category,

        film_session.show_time,
        (film_session.seats-film_session.busy_seats) as free_seats

        FROM film_session
        LEFT JOIN films ON film_session.film_id=films.id
        LEFT JOIN rooms ON film_session.room_id=rooms.id"
    );

    if ($result){
        $counter = 1;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $pdf->Cell($w[0],$h,$counter,'LRBT','0','C',true);
            $pdf->Cell($w[1],$h,$row[0],'LRB');

            for ($c = 2; $c < 8; $c++){
                if ($c==3){
                    $row[2] = date("d/m/Y", strtotime($row[2]));
                }
                else if ($c==6){
                    $row[5] = date("h:i - d/m/Y", strtotime($row[5]));
                }

                $pdf->Cell($w[$c],$h,$row[$c-1],'RB');
            }
            $pdf->Ln();
            $counter++;
        }
    }

    $pdf->Output("I",'Games.pdf',true);
?>