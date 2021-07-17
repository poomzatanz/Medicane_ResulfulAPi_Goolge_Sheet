<?php
$id = $_POST['id'];
$image = $_FILES['image']['name'];
$name = $_POST['name'];
$data_text = $_POST['data_text'];
$pic_old =$_POST['pic_old'];
$fileimage = $dir . basename($_FILES["image"]["name"]);
if(empty($image)){
    $url = 'https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=edit01&sheet_name=Data_Medi';
    $data = array('id' => $id ,'name' => $name ,'pic' => $pic_old, 'data_text' => $data_text);
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
<?php
}else{
    $dir = "uploads/";
    $fileimage = $dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileimage)) {
    } else {
    }
    $url = 'https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=edit01&sheet_name=Data_Medi';
    $data = array('id' => $id ,'name' => $name ,'pic' => $fileimage, 'data_text' => $data_text);
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
    if ($result === FALSE) {
    } else { ?>
     <script langquage='javascript'>
         window.location = "form_Data_Medi.php";
     </script>
 <?php }

    ?>
<?php
}
?>