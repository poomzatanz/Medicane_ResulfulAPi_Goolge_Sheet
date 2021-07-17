<?php
$id = $_GET['id'];

$url = 'https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=delete&sheet_name=Data_Medi';

$data = array('id' => $id);
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
  <script langquage='javascript'>  window.location="form_Data_Medi.php"; </script>
<?php }
 
?>


