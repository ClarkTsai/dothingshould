<?php 
if(@$_POST['nickname']!='' && @$_COOKIE['mail']!='sent'){
$nickname=$_POST['nickname'];
$email=$_POST['email'];
$sub=$_POST['subject'];
$content=$_POST['content'];

mb_internal_encoding("utf-8");
$to="pjchender@mailinator.com";//填入自己的電子信箱
$subject=mb_encode_mimeheader("$sub","utf-8");
$message="$content";
$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=utf-8\r\n";
$headers.="From:".mb_encode_mimeheader("$nickname","utf-8")."<$email>\r\n";
mail($to,$subject,$message,$headers);
setcookie("mail","sent",time()+60*3);
}else if(@$_POST['nickname']!='' && @$_COOKIE['mail']=='sent'){
 echo "<span class='alert alert-warning'>三分鐘只能寄一次信件</span>";
}
?>