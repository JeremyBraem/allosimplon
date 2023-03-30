<?php
    function  afficherTable($rows, $headers) {
?>
<body class="bg-[#FCFCFC]">
<table border="1">
		    <tr>
		    <?php foreach ($headers as $header): ?>
		        <th class="border-2 border-black"><?php echo $header; ?></th>
		    <?php endforeach; ?>
		    </tr>

			<?php foreach ($rows as $row): ?>
			    <tr>
			    <?php for ($k = 0; $k < count($headers); $k++): ?>
			    	<?php if ($k == 0){ ?>
			    		<td><?php echo '<a href=../form/form-acteur.php?id='.$row[$k].' >'.$row[$k].'</a>'; ?></td>
			    	<?php } else { ?>
			    		<td class="border-2 border-grey"><?php echo $row[$k]; ?></td>
			    	<?php } ?>
			    <?php endfor; ?>
			    </tr>
			<?php endforeach; ?>
		</table>
</body>
<?php 

} 

function getHeaderTable() {
	$headers = array();
	$headers[] = "ID";
	$headers[] = "Nom";
	return $headers;
}

?>