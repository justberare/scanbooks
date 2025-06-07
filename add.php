<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Scan Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
</head>
<body>
<div class="container my-4">
  <h1>Scan Barcode</h1>
  <div id="scanner" class="w-100" style="height:300px;"></div>
  <div id="result" class="mt-3"></div>
</div>
<?php include 'navbar.php'; ?>
<script>
function startScanner(){
    Quagga.init({
        inputStream : {
          name : "Live",
          type : "LiveStream",
          target: document.querySelector('#scanner')
        },
        decoder : {
          readers : ["ean_reader"]
        }
    }, function(err) {
        if (err) {
            console.log(err);
            return;
        }
        Quagga.start();
    });
    Quagga.onDetected(function(data){
        var code = data.codeResult.code;
        Quagga.stop();
        $('#result').text('Detected: '+code);
        $.post('save_item.php', {barcode: code}, function(res){
            $('#result').append('<br>'+res.message);
        }, 'json');
    });
}
$(document).ready(function(){
    startScanner();
});
</script>
</body>
</html>
