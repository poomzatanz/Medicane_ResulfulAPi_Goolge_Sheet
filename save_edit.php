<?php
$id = $_POST['id'];
$name = $_POST['name'];
$num = $_POST['num'];
$first_date = $_POST['first_date'];
$last_date = $_POST['last_date'];
$url = 'https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=edit&sheet_name=Medi';

$data = array('id' => $id ,'name' => $name ,'first_date' => $first_date, 'last_date' => $last_date, 'num' => $num);
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
  <script langquage='javascript'>  window.location="index.php"; </script>
<?php }
 
?>
