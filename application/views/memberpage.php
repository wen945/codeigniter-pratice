<?php if($this->session->flashdata('status')): ?>
	<div class='text-center'>
	<?= $this->session->flashdata('status');?>
</div>
<?php 
endif; 
unset($_SESSION['status']);
?>

<h3 class="text-center">會員資料</h3>
<table border="1" width="600" align="center">
	<thead>
		<tr>
			<th>信箱</th>
			<th>密碼</th>
			<th>姓名</th>
			<th>電話</th>
			<th>會員資料修改</th>
		</tr>
	</thead>
</table>

