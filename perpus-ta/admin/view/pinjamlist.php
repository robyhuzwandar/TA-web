<div class="panel panel-default">
	<div class="panel-heading">
		List Peminjaman
	</div>
	<div class="panel-body">
<div class="form-group">
	<div class="row">
		<div class="col-md-1">
			Telat : 3
		</div>
		<div class="col-md-2">
			Jumlah Peminjam : 12
		</div>
	</div>
	<hr>
</div>

<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    		<thead>
		        <tr>
		  	  		<th>No.</th>
		  	  		<th>Judul Buku</th>
		  	  		<th>Action</th>
		    	</tr>
		    </thead>
		        <tbody>
			        <?php
			        $i=0;
			        $pinjam = $t->getTemp();
			        if ($pinjam) {
			          while ($result = $pinjam->fetch_assoc()) {
			            $i++;
			          ?>
			        <tr>
		    			<td><?php echo $i."."; ?></td>
		    			<td width="13%"><?php 
		    				$value = $b->getBukuBykodeBuku($result['buku_kodeBuku'])->fetch_assoc();
		    				echo $value['judul'];
		    			?></td>
				    	<td width="16%">
				    		<a href="../aksi/bukuUpdate.php?bId=<?php echo $result['id']; ?>"><button class="btn-primary btn-sm">Edit</button></a>
				            <a onclick="return confirm('Yakin untuk Hapus Data ?')" href="bukulist.php?delBid=<?php echo $result['id']; ?>"><button class="btn-danger btn-sm">Hapus</button></a>
				    	</td>
			    	</tr>
			        <?php } } ?>
		      	</tbody>
	   </table>
	</div>	
</div>











