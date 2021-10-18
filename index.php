<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #produk{
            max-height: 500px;
            max-width: 1000px;
        }
    </style>
</head>
<body>

    <h3>CHART JS</h3>
    <br><br>

    <canvas id="produk"></canvas>

    <?php
        $connect = mysqli_connect("localhost", "root", "", "db_chart");
        $produk = mysqli_query($connect, "SELECT * FROM barang");
    ?>
    <script src="chart.min.js"></script>
    <script>
        var ctx = document.getElementById('produk');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                        foreach ($produk as $namaProduk) {
                            echo '"'.$namaProduk["produk"].'",';
                        }
                    ?>
                    ],
                datasets: [{
                    label: 'Produk',
                    data: [
                        <?php
                            foreach ($produk as $jumlahProduk) {
                                echo '"'.$jumlahProduk["jumlah"].'",';
                            }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>