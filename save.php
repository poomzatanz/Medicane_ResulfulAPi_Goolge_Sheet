<?php
$name = $_POST['name'];
$num_stock = $_POST['num_stock'];
$num_real = $_POST['num_real'];
$last_date = $_POST['last_date'];
$status = "";

$today =  strtotime($last_date);
$last_date01 = date('ํY-m-d',strtotime('-6 month', $today));

$url = 'https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=insert&sheet_name=Medi';

$data = array('name' => $name ,'status' => $status, 'last_date' => $last_date,  'num_stock' => $num_stock,'num_real' => $num_real);
$datas = json_encode($data);
 
$options = array(
   'http' => array(
       'header'  => "Content-type: application/json",
       'method'  => 'POST',
       'content' => ($datas)
   )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {  }
else{ ?>
  <script langquage='javascript'>  window.location="index.php"; </script>
<?php }
 
?>


