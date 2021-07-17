<?php
$id = $_POST['id'];
$name = $_POST['name'];
$data_text = $_POST['data_text'];
$pic = $_POST['pic'];
$pic = substr($pic,32,33);

$url = 'https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=edit01&sheet_name=Data_Medi';
$data = array('id' => $id, 'name' => $name, 'pic' => $pic , 'data_text' => $data_text);
$datas = json_encode($data );
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