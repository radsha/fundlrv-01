 <?php
// echo phpinfo();
$hostname = "localhost";
$database = "dbfund_lrv";
$username = "root";
$password = "";
$cone2010 = mysql_pconnect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database, $cone2010);
mysql_query("set NAMES tis620");

$db_query=mysql_list_tables($database, $cone2010);/* ใช้ฟังก์ชั่น mysql_list_tables เพื่อหาตาราง */
$num_table= mysql_num_rows($db_query); /* นับจำนวนตารางที่พบ */

 @$tbname=$_GET['tbname'];
 if ($tbname=='') {
  	 $tbname=mysql_tablename($db_query,0);
 } else {
 	 $tbname=$_GET['tbname'];
 }

mysql_select_db($database, $cone2010);
$query_rsfield = "SELECT * FROM $tbname  ";
$rsfield = mysql_query($query_rsfield, $cone2010) or die(mysql_error());
$totalfield = mysql_num_fields($rsfield);

$cf=$totalfield-1;

for($cftb=0;$cftb<=$cf;$cftb++) {
//firthfield
$f1=mysql_field_name($rsfield,0);
$vf1="$".mysql_field_name($rsfield,0);
//POST
$postf=@$postf."$".mysql_field_name( $rsfield ,$cftb)."=\$_POST['".mysql_field_name( $rsfield ,$cftb)."']; <br>";
//GET
$getf=@$getf."$".mysql_field_name( $rsfield ,$cftb)."=\$_GET['".mysql_field_name( $rsfield ,$cftb)."']; <br>";
//+=
$vstr=@$vstr."\$t".mysql_field_name( $rsfield ,$cftb)."+=\$row_rsreport['".mysql_field_name( $rsfield ,$cftb)."']; <br>";
//$i
$vstr2=@$vstr2."\$".mysql_field_name( $rsfield ,$cftb)."[\$i]=\$row_rsreport['".mysql_field_name( $rsfield ,$cftb)."']; <br>";
//echo
$tstr=@$tstr."echo \$".mysql_field_name( $rsfield ,$cftb)." ;<br>";
//echo t
$tstr2=@$tstr2."echo \$t".mysql_field_name( $rsfield ,$cftb)." ;<br>";
//=
$vstr5=@$vstr5."\$".mysql_field_name( $rsfield ,$cftb)."=\$row_rsfind['".mysql_field_name( $rsfield ,$cftb)."']; <br>";
$vstr6=@$vstr6."\$".mysql_field_name( $rsfield ,$cftb)."=''; <br>";
//session $_SESSION['s_prakan']=$row_rslogin['prakan'];
$vstr7=@$vstr7."\$_SESSION['s_".mysql_field_name( $rsfield ,$cftb)."']=\$row_rslogin['".mysql_field_name( $rsfield ,$cftb)."']; <br>";
$vstr8=@$vstr8."'".mysql_field_name( $rsfield ,$cftb).".required' => 'กรุณาป้อน', <br>";

$vstr9=@$vstr9."'".mysql_field_name( $rsfield ,$cftb)."' => 'required', <br>";
$vstr10=@$vstr10."\$item -> ".mysql_field_name( $rsfield ,$cftb)."= \$request->input('".mysql_field_name( $rsfield ,$cftb)."');<br>";
 //if ($data['0']=='') {$a=$a; } else { $a=$data['0']; }

        if ($cftb==$cf) {
        //Insert
        $insertf=$insertf."`".mysql_field_name( $rsfield ,$cftb)."`";
        $insertv=$insertv."'$".mysql_field_name( $rsfield ,$cftb)."'";
        //SUM
        $sumf=$sumf."SUM($tbname.".mysql_field_name( $rsfield ,$cftb).") as ".mysql_field_name( $rsfield ,$cftb)."";
        //UPDATE
        $cstr=$cstr."`".mysql_field_name( $rsfield,$cftb)."`='$".mysql_field_name( $rsfield ,$cftb)."'";
        } else {
        //Insert
        $insertf=@$insertf."`".mysql_field_name( $rsfield ,$cftb)."`,";
        $insertv=@$insertv."'$".mysql_field_name( $rsfield ,$cftb)."',";
        //SUM
        $sumf=@$sumf."SUM($tbname.".mysql_field_name( $rsfield ,$cftb).") as ".mysql_field_name( $rsfield ,$cftb).",";
        //UPDATE
        $cstr=@$cstr."`".mysql_field_name( $rsfield ,$cftb)."`='$".mysql_field_name($rsfield ,$cftb)."',";
        }
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> ฐานข้อมูล <?php echo $database ?>  มีตาราง <?php echo $num_table?> ตาราง </title>

<style type="text/css">

table { font-family: tahoma; font-size: 11pt }
td { font-family: tahoma; font-size: 11pt }
div { font-family: tahoma; font-size: 11pt }
span { font-family: tahoma; font-size: 11pt }
input { font-family: tahoma; font-size: 11pt }
option { font-family: tahoma; font-size: 11pt }
TextArea {font-family : tahoma;font-size : 11pt}
Textbox {font-family : tahoma;font-size : 11pt}
body {
margin-top:0;
margin-left:0;
}

</style>
<body topmargin="0" leftmargin="0" >

<table width="99%" border="1" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="13%" rowspan="5" valign="top" bgcolor="#FFFFFF"><?php
 $a=0;
while($a < $num_table ) {
 $tb[$a]=mysql_tablename($db_query,$a);
?>
        <a href="?tbname=<?php echo  $tb[$a];?>">
          <?php  echo  $tb[$a]; ?>
        </a> <br />
        <?php
 $a++;
 }
?></td>
      <td height="134" align="left" valign="top" bgcolor="#FFFFFF"><p>&lt;div class=&quot;table-responsive&quot;   &gt;<br />
  &nbsp;&nbsp;&nbsp;&lt;table class=&quot;table table-striped table-bordered table-hover&quot;&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;thead&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;tr class=&quot;info&quot; &gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th &gt;#&lt;/th&gt;<br />
  <?php  for($q=0;$q<=$cf;$q++) {?>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;<?php echo mysql_field_name( $rsfield ,$q) ?>&lt;/th&gt;<br />
  <?php } ?>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th &gt;&lt;a href='{{url('<?php echo $tbname?>/create')}}' &gt;&lt;i class=&quot;fa  fa-plus-circle  text-success&quot; style=&quot;font-size:25px&quot;&gt;&lt;/i&gt; &lt;/a&gt;  &lt;/th&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/thead&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;tbody&gt;<br />
&nbsp;&nbsp;&nbsp;  @foreach ($data as $data)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope=&quot;row&quot;&gt;{{++$no}}&lt;/th&gt;<br />
  <?php  for($q=0;$q<=$cf;$q++) {?>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;  {{ $data-&gt;<?php echo mysql_field_name( $rsfield ,$q) ?>}} &lt;/td&gt;<br />
  &nbsp;
  <?php } ?>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &lt;a href=&quot;{{ url('<?php echo $tbname?>/'.$data-&gt;<?php echo mysql_field_name( $rsfield ,0) ?> .'/edit') }}&quot;&gt; &lt;i class=&quot;fa fa-edit text-success&quot; style=&quot;font-size:16px&quot;&gt;&lt;/i&gt;&lt;/a&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a href=&quot;{{ url('<?php echo $tbname?>-delete/'. $data-&gt;<?php echo mysql_field_name( $rsfield ,0) ?>) }}&quot; onclick=&quot;return confirm('ยืนยันการลบ')&quot;  style=&quot;font-size:16px&quot;&gt;&lt;i class=&quot;fa fa-times text-danger&quot; &gt;&lt;/i&gt; &lt;/a&gt;<br />
  <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$ck=App\fundtype_de::tdata($data-&gt;fundid,'0000')}}<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@if($ck=='yes')<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a href=&quot;{{ url('fundtype_de/'. $data-&gt;fundid) }}&quot;   style=&quot;font-size:16px&quot;&gt;&lt;i class=&quot;fa fa-file-text text-primary&quot; &gt;&lt;/i&gt; &lt;/a&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@else<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a href=&quot;{{ url('fundtype_de/create?fundid='.$data-&gt;fundid) }}&quot;   style=&quot;font-size:16px&quot;&gt;&lt;i class=&quot;fa fa-file-text text-primary&quot; &gt;&lt;/i&gt; &lt;/a&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@endif<br />
        <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/td&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@endforeach<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&lt;/tbody&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&lt;/table&gt;<br />
  &lt;/div&gt;</p>
        <p> &lt;div class=&quot;text-center&quot;&gt;<br />
  &lt;i class=&quot;fa  fa-plus-circle  text-success&quot; style=&quot;font-size:16px&quot;&gt;&lt;/i&gt; การเพิ่ม &amp;nbsp;&lt;i class=&quot;fa fa-edit text-success&quot; style=&quot;font-size:16px&quot;&gt;&lt;/i&gt;&amp;nbsp; การแก้ไข &lt;i class=&quot;fa fa-times text-danger&quot; &gt;&lt;/i&gt; การลบ&lt;/div&gt;</p></td>
    </tr>
    <tr>
      	 <td align="left" valign="top" bgcolor="#FFFFFF"><p> &lt;form class=&quot;form-horizontal&quot;  method=&quot;post&quot; action=&quot;{{url( $url )}}&quot;&gt;<br />
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@if( $id != 0)<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type=&quot;hidden&quot; name=&quot;_method&quot; value=&quot;PUT&quot; /&gt;<br />
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@endif<br />
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;{{ csrf_token() }}&quot;&gt;<br />
    <?php  for($q=0;$q<=$cf;$q++) {?>
         <p> &lt;div class=&quot;form-group has-success&quot;&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label  class=&quot;col-sm-2 control-label&quot;&gt;<?php echo mysql_field_name( $rsfield ,$q) ?>&lt;/label&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class=&quot;col-sm-10&quot;&gt;<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type=&quot;text&quot; class=&quot;form-control&quot; name=&quot;<?php echo mysql_field_name( $rsfield ,$q) ?>&quot; placeholder=&quot;<?php echo mysql_field_name( $rsfield ,$q) ?>&quot; value=&quot;{{ $data ? $data-&gt;<?php echo mysql_field_name( $rsfield ,$q) ?> : old('<?php echo mysql_field_name( $rsfield ,$q) ?>') }}&quot;&gt;<br />
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! $errors-&gt;first('<?php echo mysql_field_name( $rsfield ,$q) ?>') !!}<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />
  &lt;/div&gt;</p>
  <?php } ?>
        &lt;div class=&quot;form-group&quot;&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div class=&quot;col-sm-offset-2 col-sm-10&quot;&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button type=&quot;submit&quot; class=&quot;btn btn-primary&quot;&gt;บันทึก&lt;/button&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br />
&lt;/form&gt;</td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFFFF"><?php echo $vstr8; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFFFF"><?php echo $vstr9; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFFFF">$item =  <?php echo $tbname?>::where('fundidL', $id)->first();<br /><?php echo $vstr10; ?>
        $item-&gt;save();</td>
    </tr>
</table>
</body>
</html>
<?php
  mysql_close();
  ?>
