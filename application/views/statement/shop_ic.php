<?php	
$date = $_GET[date];
$date = explode("-",$date);
$year = $date[0];
$month = $date[1];
//echo $year." ".$month;
$select = "SELECT t1.*,t2.topic_th as product_name FROM order_booking as t1 left join shopping_product as t2 on t1.program = t2.id where t1.status LIKE 'COMPLETED' and t1.drivername = '".$_COOKIE[detect_user]."' and (MONTH(t1.transfer_date) = '".$month."' and YEAR(t1.transfer_date) = '".$year."')  order by t1.transfer_date desc  ";

		$query = $this->db->query($select);
		$befordate = '';
		$i = 0;
		$num = $query->num_rows();
		if($num<1){ ?>
			<div class="font-26" style="color: #ff0000;text-align: center;padding: 0px; margin-top: -10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>
	 <?php } ?>
<ons-list id="body_list_ic_shop" >	 
	<?php	foreach ($query->result() as $row){ 
			$tras_d_time = date_create($row->transfer_date);

			if($befordate != $row->transfer_date){ 
				$befordate = $row->transfer_date;
				
				?>
		<ons-list-header style="font-size: 12px;font-weight: 500;"><?="วันที่ ".date_format($tras_d_time,"Y-m-d");?></ons-list-header>
<?php			}	?>
       <div style="border-bottom: 0px solid #ccc; padding: 15px 5px;" onclick="openDetailOrder('<?=$row->id;?>', '<?=$row->invoice;?>');">
       		<table width="100%">
       			<tr>
       				<td width="70"><?=$row->invoice;?></td>
       				<td>
       					<span><?=$row->product_name;?></span><br/>
       					<span class="font-14"><?=date('Y-m-d h:i',$row->post_date);?></span>
       				</td>
       				<td align="right"><b><?="+ ".number_format($row->price_all_total,2);?></b></td>
       			</tr>
       		</table>
       </div>
			
<?php		}
?>
</ons-list>