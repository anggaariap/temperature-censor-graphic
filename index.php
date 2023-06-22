<!DOCTYPE html>
<html>
<style>
body {
  background-image: url('iot2.gif');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
<header>
<!-- Pemanis untuk menampilkan gambar -->
<div class="container" style="text-align: center;">
<img src="assets/img/bg2.png">
</div>
<title>Grafik Sensor</title>
<!-- panggil file bootstrap -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
<script type="text/javascript" src="assets/js/mdb.min.js"></script>
<script type="text/javascript" src="jquery-latest.js"></script>
<!-- memanggil data grafik -->
<script type="text/javascript">
var refreshid = setInterval(function(){
     $('#responsecontainer').load('data.php');
}, 1000);

</script>
</header>
<body>
<!-- tempat untuk tampilan grafik -->
<div class="container" style="text-align: center;">
<p>(Data yang ditampilkan adalah 5 data terakhir)</p>
</div>

<!-- div untuk grafik -->
<div class="container">
<div class="container" id="responsecontainer" style="width: 70%"></div>
</div>

<!-- Pemanis untuk menampilkan gambar -->

</body>
</html>