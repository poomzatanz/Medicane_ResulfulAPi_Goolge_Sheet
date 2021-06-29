<?php
$name = $_POST['name'];
$num = $_POST['num'];

$first_date = date('d-m-Y');
$today =  strtotime(date('d-m-Y'));
$today01 =  strtotime(date('d-m-Y'));
$last_date = date('d-m-Y',strtotime('+6 month 543 year', $today));
$first_date = date('d-m-Y',strtotime('543 year', $today01));
$url = 'https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=insert&sheet_name=Medi';

$data = array('name' => $name ,'first_date' => $first_date, 'last_date' => $last_date, 'num' => $num);
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


