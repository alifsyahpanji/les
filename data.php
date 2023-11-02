<?php
session_start();
if ($_SESSION["pass"] == "") {
    header("Location: login.html");
    die();
}


include("env.php");

$sql_select = "SELECT * FROM pendaftaran ORDER BY id DESC";
$run_sql_select = mysqli_query($conn, $sql_select);
$count_select = mysqli_num_rows($run_sql_select);

function fiturWa($data_telepon)
{
    $remove_number = substr($data_telepon, 1);
    $result = "https://wa.me/62" . $remove_number;
    return $result;
}

function tgl($data_tgl)
{
    $newDate = date("d-F-Y", strtotime($data_tgl));
    return $newDate;
}


?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Les Privat Gitar Akustik Semarang</title>
    <meta name="description"
        content="Kembangkan bakat bermain gitar kamu dengan les privat yang dirancang khusus untuk pemula, Siapa pun bisa bermain gitar.">
    <link rel="icon" href="assets/image/icon.jpg" type="image/x-icon">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>

<body class="body-data">

    <div class="container-data">

        <div class="margin-data">

            <div class="card" style="width: 290px;">
                <div class="card-body">
                    <p class="card-text">Pendaftar Les Gitar Ada <span class="fw-bolder">
                            <?php echo $count_select; ?>
                        </span> Orang</p>
                </div>
            </div>



            <?php

            if ($count_select > 0) {
                while ($row_result = mysqli_fetch_assoc($run_sql_select)) {
                    ?>

                    <div class="card mt-4" style="width: 290px;">

                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $row_result["nama"]; ?>
                            </h5>


                            <div class="mt-1">Telepon: <span class="fw-bolder">
                                    <?php echo $row_result["telepon"]; ?>
                                </span> </div>

                            <div class="mt-1">Alamat: <span class="fw-bolder">
                                    <?php echo $row_result["alamat"]; ?>
                                </span> </div>

                            <div class="mt-1">Tanggal Daftar: <span class="fw-bolder">
                                    <?php echo tgl($row_result["tanggal"]); ?>
                                </span> </div>



                            <a href="<?php echo fiturWa($row_result["telepon"]); ?>" class="btn btn-primary mt-2">Whatsapp</a>
                        </div>
                    </div>

                    <?php



                }
            }


            ?>


        </div>

    </div>

</body>

</html>