<?php
$konek = mysqli_connect("localhost", "root", "", "grafiksensor");
$sql_ID = mysqli_query($konek, "SELECT MAX(ID) FROM tb_sensor");
$data_ID = mysqli_fetch_array($sql_ID);
$ID_akhir = $data_ID['MAX(ID)'];
$ID_awal = $ID_akhir - 4;
$tanggal = mysqli_query($konek, "SELECT tanggal FROM tb_sensor WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
$suhu = mysqli_query($konek, "SELECT suhu FROM tb_sensor WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
$kelembaban = mysqli_query($konek, "SELECT kelembaban FROM tb_sensor WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC")
?>

<div class="panel panel-primary">
    <div class="panel-heading" style="text-align: center;">
        Grafik Sensor
    </div>
<div class="panel-body">
<!-- siapkan canvas untuk grafik -->
<canvas id="myChart"></canvas>
<!-- gambar grafik -->
<script type="text/javascript">
//baca ID canvas tempat garfik akan diletakkan
var canvas = document.getElementById('myChart');
// letakkan data tanggal dan suhu untuk grafik
var data = {
labels : [
<?php
while ($data_tanggal = mysqli_fetch_array($tanggal))
{
    echo '"'.$data_tanggal['tanggal'].'",' ;
}
?>
],
datasets : [{
label: "Suhu",
fill: true,
backgroundColor: "rgba(52, 231, 43, 0.2)",
borderColor: "rgba(52, 231, 43, 1)",
lineTension: 0.5,
pointRadius: 5,
data: [
    <?php
    while($data_suhu = mysqli_fetch_array($suhu))
    {
        echo $data_suhu['suhu'].',' ;
    }
    ?>
]
}, 
{
label : "kelembaban",
fill: true,
backgroundColor: "rgba(239, 82, 93, 0.2)",
borderColor: "rgba(239, 82, 93, 1)",
lineTension: 0.5,
pointRadius: 5, 
data: [
    <?php
    while($data_kelembaban = mysqli_fetch_array($kelembaban))
    {
        echo $data_kelembaban['kelembaban'].',' ;
    }
    ?>
]
}
]
};

var option = {
    showLines : true,
    animation : {duration : 0}
};

var myLineChart = Chart.Line(canvas, {
    data : data,
    options : option
});
</script>
</div>
</div>

