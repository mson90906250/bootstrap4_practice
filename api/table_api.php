<?php 
	$link =  mysqli_connect("localhost","admin","123456","demoDB");
  $link->query("SET NAMES UTF8");
	$result = $link->query("SELECT * FROM profit");

	ob_start();
 ?>

<table class="table table-hover table-rwd">
  <thead>
    <tr class="info">
      <th>id</th>
      <th>name</th>
      <th>addr</th>
      <th>money</th>
    </tr>
  </thead>
  <tbody>
  	<?php while($row = mysqli_fetch_assoc($result)): ?>
	    <tr class="<?php echo (($row['money']>10000)?'danger':''); ?>">
	      <td data-th="編號"><?php echo sprintf("%03d",$row["id"]) ?></td>
	      <td data-th="姓名"><?php echo $row["name"] ?></td>
	      <td data-th="區域" class="<?php echo (($row['addr'] == '臺中市')?'text-success lead':''); ?>"><?php echo $row["addr"] ?></td>
	      <td data-th="金額"><?php echo $row["money"] ?></td>
	    </tr>
	<?php endwhile; ?>
  </tbody>
</table>

 <?php 
	echo ob_get_clean();
  ?>