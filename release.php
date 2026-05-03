<?php

//die();
include 'head1.php';
include 'session1.php';

$e1=mysqli_query($con, "select * from jeeexam where remarks='yes' ");
$e2 = mysqli_fetch_array($e1);
$year=$e2['year'];


$memo='NO.F.1(5-432)-DHE/Estt (G)/82 (L-III)';
$dated='10-04-2026';


$day='22-04-2026';$dayb='21-04-2026';$daya='23-04-2026';


?>
<!DOCTYPE html>
<html>
<title>Release Order</title>
<style type="text/css">
@media print {
    #t1 {
        display :  none;
    }
#printbtn {
        display :  none;
    }
    #session5 {
        display :  none;
    }
}
	
body {
            font-family: "Times New Roman", serif;
            margin: 40px;
            line-height: 1.6;
        }
        .header {
            display: flex;
            justify-content: space-between;
        }
        .center {
            text-align: center;
            font-weight: bold;
        }
        .right {
            text-align: right;
        }
        .signature {
            margin-top: 40px;
            text-align: center;
        }
</style>

<script> var ss="Release Order TJEE-<?php echo $year; ?>"</script>
<input type="button" onclick="document.title= ss;  window.print();" id="printbtn" value="Print" style="font-size:2.5ex;" />

</head>
<body >

<?php
$no=0;
$row1=mysqli_query($con, "SELECT  * FROM observers where year='$year' and examcenter!='Reserve'  order by examcenter");

while($row2 = mysqli_fetch_array($row1))
{
	++$no;
	
	
$row1b=mysqli_query($con, "SELECT  * FROM examcenterjee where examcenter='$row2[examcenter]'");

$row2b = mysqli_fetch_array($row1b);

if ($row2b['detention']=='1')
{
	$date1=$day;
    $date2=$day;
}

if ($row2b['detention']=='2')
	{
	$date1=$dayb;
    $date2=$day;
}


if ($row2b['detention']=='3')
	{
	$date1=$dayb;
    $date2=$daya;
}
	
	
?>
<br/><br/><br/><br/><br/><br/><br/><br/>

<div class="header">
    <div>No.F.1 (1) DHE/TBJEE/2026-27(Vol-1)/</div>
    <div>Agartala, <?php echo $date2; ?></div>
</div>

<p class="center">M E M O</p>

<p><b>Subject:</b> Release order of Observer of TJEE-<?php echo $year; ?>.</p>

<p style="text-align: justify;">
In pursuance of Memo No. <?php echo $memo; ?> dated, <?php echo $dated; ?>, the following observer reported to the office of the Tripura Board of Joint Entrance Examination on <?php echo $date1; ?> (forenoon) and successfully performed the assigned duties as an observer of TJEE-<?php echo $year; ?> at the exam center, <?php echo $row2['examcenter'];?>. The observer has been released on <?php echo $date2; ?> (afternoon) from the office of TBJEE.
</p>
<div style="width: 60%; margin: auto; text-align: left;">
<?php

		if ($row2['college']=='Tripura Govt. Law College')
{
echo " <b>$row2[name]</b>, $row2[designation] in $row2[department]<br/> $row2[college] ";	
}
else
{
echo " <b>$row2[name]</b>, $row2[designation]<br/> Department of $row2[department]<br/> $row2[college] ";	
}
?>
</div>
<p>
On behalf of the Board, the Chairman expresses sincere thanks for the valuable service rendered.
</p>
<br/><br/>
<div style="width: 250px; margin-left: auto; text-align: center;" >
    <p>(Dr. Suvadip Paul)<br/>
    Chairman<br/>
    Tripura Board of Joint Entrance Examination</p>
</div>

<hr>

<p><b>Copy to:</b></p>
<ol>
    <li>P.A. to the Director, Directorate of Higher Education, Government of Tripura</li>
    <li>The Principal, <?php echo $row2['college'];?></li>
</ol>

<?php


echo "<div style='page-break-after:always'></div>";
}







$no=0;
$row1=mysqli_query($con, "SELECT  * FROM observers where year='$year' and examcenter='Reserve'  order by examcenter");

while($row2 = mysqli_fetch_array($row1))
{
	++$no;
	
	

?>
<br/><br/><br/><br/><br/><br/><br/><br/>

<div class="header">
    <div>No.F.1 (1) DHE/TBJEE/2026-27(Vol-1)/</div>
    <div>Agartala, <?php echo $day; ?></div>
</div>

<p class="center">M E M O</p>

<p><b>Subject:</b> Release order of Observer of TJEE-<?php echo $year; ?>.</p>

<p style="text-align: justify;">
In pursuance of Memo No. <?php echo $memo; ?> dated, <?php echo $dated; ?>, the following observer reported to the office of the Tripura Board of Joint Entrance Examination on <?php echo $day; ?> (forenoon) and successfully performed the assigned duties as an observer of TJEE-<?php echo $year; ?>. The observer has been released on <?php echo $day; ?> (afternoon) from the office of TBJEE.
</p>
<div style="width: 60%; margin: auto; text-align: left;">
<?php

		if ($row2['college']=='Tripura Govt. Law College')
{
echo " <b>$row2[name]</b>, $row2[designation] in $row2[department]<br/> $row2[college] ";	
}
else
{
echo " <b>$row2[name]</b>, $row2[designation]<br/> Department of $row2[department]<br/> $row2[college] ";	
}
?>
</div>
<p>
On behalf of the Board, the Chairman expresses sincere thanks for the valuable service rendered.
</p>
<br/><br/>
<div style="width: 250px; margin-left: auto; text-align: center;" >
    <p>(Dr. Suvadip Paul)<br/>
    Chairman<br/>
    Tripura Board of Joint Entrance Examination</p>
</div>

<hr>

<p><b>Copy to:</b></p>
<ol>
    <li>P.A. to the Director, Directorate of Higher Education, Government of Tripura</li>
    <li>The Principal, <?php echo $row2['college'];?></li>
</ol>

<?php


echo "<div style='page-break-after:always'></div>";
}








?>

</body>
</html>

