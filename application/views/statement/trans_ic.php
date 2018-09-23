<!--<div class="font-26" style="color: #ff0000;text-align: center;padding: 0px; margin-top: -10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>-->
<?php 
//	echo json_encode($_POST[data]);
?>
<ons-list id="body_list_ic_shop" >	 
	<?php	
		$befordate = '';
		foreach ($_POST[data] as $row){ 
			$total = intval($row[cost])-intval($row[s_cost]);
//			$tras_d_time = date_create($row->transfer_date);
			if($befordate != $row[ondate]){ 
				$befordate = $row[ondate];
				
				?>
		<ons-list-header style="font-size: 12px;font-weight: 500;"><?="วันที่ ".$row[ondate];?></ons-list-header>
<?php			}	?>
       <div style="border-bottom: 0px solid #ccc; padding: 15px 5px;" onclick="openDetailOrder('<?=$row->id;?>', '<?=$row->invoice;?>');">
       		<table width="100%">
       			<tr>
       				<td width="70"><?=$row[invoice];?></td>
       				<td>
       					<span class="font-16"><?=$row[pickup_place][topic];?></span><br/>
       					<span class="font-16"><?=$row[to_place][topic];?></span>
       				</td>
       				<td align="right"><b><?="+ ".number_format($total,2);?></b></td>
       			</tr>
       		</table>
       </div>
			
<?php		}
?>
</ons-list>