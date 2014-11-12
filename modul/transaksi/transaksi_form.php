<div class="row-fluid">
	<div class="span12">
		<div class="da-panel collapsible">
			<div class="da-panel-header">
				<span class="da-panel-title">
					<i class="icon-notes-2"></i>
					Transaksi
				</span>
			</div>
			<div id="da-ex-tabs">
				<ul>
					<li><a href="#tabs-1">Paket</a></li>
					<li><a href="#tabs-2">Menu</a></li>
				</ul>
				<div id="tabs-1">
					<div class="de-gallery">
						<div class="de-package">
							<ul>
								<?php
									$q_paket = mysql_query("select * from paket");
									while($dt_paket = mysql_fetch_array($q_paket)) {
									
								?>
								<li class="de-panel-content-top-border">  
									<a class="item" href="#">
										<?php
											if(!isset($dt_paket['photo'])||$dt_paket['photo']=="0"){
										?>
											<img alt="300x200" style="width: 300px; height: 200px;" src="sistem/pics/no_image.jpg"> 
										<?php }else{ ?>
											<img alt="300x200" style="width: 300px; height: 200px;" src="<?php echo $dt_paket['photo']?>"> 
										<?php } ?>
									</a>
									<div data-tipe="id" class="de-hide"><?php echo $dt_paket['id']?></div>
									<div data-tipe="tipe" class="de-hide">paket</div>
									
									<h3 data-tipe="nama"><?php echo $dt_paket['nama']?></h3>
									<p>
										Tersisa : 
										<?php if(isset($dt_paket['jumlah'])){
											echo $dt_paket['jumlah'];
										}else{
											echo "x";
										}?>
									
									</p>
									<p>
										<?php echo $dt_paket['keterangan']; ?>
									</p>
									<p>
										Harga Rp. <span class="number"><?php echo $dt_paket['harga']; ?></span>
									</p>
									<div data-tipe="harga" class="de-hide"><?php echo $dt_paket['harga'] ?></div>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<div id="tabs-2">
					<div class="de-gallery">
						<ul>
							<?php
								$q_menu = mysql_query("select * from menu");
								
								while($dt_menu = mysql_fetch_array($q_menu)) {
								
							?>
							<li class="de-panel-content-top-border">  
								<a class="item" href="#">
									<?php
											if(!isset($dt_menu['photo'])||$dt_menu['photo']=="0"){
										?>
											<img alt="300x200" style="width: 300px; height: 200px;" src="sistem/pics/no_image.jpg"> 
										<?php }else{ ?>
											<img alt="300x200" style="width: 300px; height: 200px;" src="<?php echo $dt_menu['photo']?>"> 
										<?php } ?>
								</a>
								<div data-tipe="id" class="de-hide"><?php echo $dt_menu['id']?></div>
								<div data-tipe="tipe" class="de-hide">menu</div>
								<h3 data-tipe="nama"><?php echo $dt_menu['nama'] ?></h3>
								
								<p>
									Tersisa : 
									<?php if(isset($dt_menu['jumlah'])){
										echo $dt_menu['jumlah'];
									}else{
										echo "x";
									}?>
								
								</p>
								<p>
									<?php echo $dt_paket['keterangan']; ?>
								</p>
								<p>
									Harga Rp. <span class="number"><?php echo $dt_menu['harga'] ?></span>
								</p>
								<div data-tipe="harga" class="de-hide"><?php echo $dt_menu['harga'] ?></div>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

