<?php
$koneksi    = mysqli_connect("localhost", "root", "", "iot_gula_db");
$nama_kota  = mysqli_query($koneksi, "SELECT nama_kota FROM kota order by id asc");
$kota_negatif = mysqli_query($koneksi, "SELECT kota_negatif FROM kota order by id asc");

$nama_kota_array = [];
while ($p = mysqli_fetch_array($nama_kota)) {
    $nama_kota_array[] = $p['nama_kota'];
}

$kota_negatif_array = [];
while ($p = mysqli_fetch_array($kota_negatif)) {
    $kota_negatif_array[] = $p['kota_negatif'];
}

?>

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("PieCandra");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [<?php foreach ($nama_kota_array as $value) { echo '"' . $value . '",';}?>],
        datasets: [{
            data: [<?php foreach ($kota_negatif_array as $value) { echo '"' . $value . '",';}?>],
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80,
    },
});
