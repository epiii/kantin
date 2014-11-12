<div id="da-sidebar">

	<!-- Navigation Toggle for < 480px -->
	<div id="da-sidebar-toggle"></div>
				
	<!-- Main Navigation -->
	<div id="da-main-nav" class="btn-container">
		<ul>
			<?php if(LEVEL=="admin") { ?>
			<li <?php if(defined('PAGE') && PAGE=='Laporan') { echo ' class="active"'; } ?>>
				<a href="laporan.php">
					<span class="da-nav-icon">
						<i class="icon-stats"></i>
					</span>
					Laporan
				</a>
			</li>
			<?php } if(LEVEL=="pengguna" || LEVEL=="pemilik" || LEVEL=="admin") { ?>
			<li <?php if(defined('PAGE') && PAGE=='Penjualan Hari Ini') { echo ' class="active"'; } ?>>
				<a href="penjualan_hari_ini.php">
					<span class="da-nav-icon">
						<i class="icon-stats"></i>
					</span>
					Penjualan Hari Ini
				</a>
			</li>
			<?php } if(LEVEL=="pengguna" || LEVEL=="pemilik" || LEVEL=="admin") { ?>
			<li <?php if(defined('PAGE') && PAGE=='Transaksi') { echo ' class="active"'; } ?>>
				<a href="transaksi.php">
					<span class="da-nav-icon">
						<i class="icon-notes-2"></i>
					</span>
					Transaksi
				</a>
			</li>
			<?php } if(LEVEL=="pemilik" || LEVEL=="admin") { ?>
			<li <?php if(defined('PAGE') && PAGE=='Makanan') { echo ' class="active"'; } ?>>
				<a href="#">
					<span class="da-nav-icon">
						<i class="icon-fast-food"></i>
					</span>
					Makanan
				</a>
				<ul>
					<li><a href="menu.php">Menu</a></li>
					<li><a href="paket.php">Paket</a></li>
				</ul>
			</li>	
			<?php } if(LEVEL=="admin") { ?>
			<li <?php if(defined('PAGE') && PAGE=='Kartu'){echo ' class="active"'; } ?>>
				<a href="#">
					<span class="da-nav-icon">
						<i class="icon-vcard"></i>
					</span>
					Kartu
				</a>
				<ul>
					<li><a href="pendaftaran_kartu.php">Pendaftaran Kartu Siswa</a></li>
					<li><a href="pendaftaran_kartu_guru.php">Pendaftaran Kartu Guru</a></li>
					<li><a href="topup.php">Top Up</a></li>
				</ul>
			</li>
			<?php } if(LEVEL=="pemilik" || LEVEL=="admin") { ?>
			<li <?php if(defined('PAGE') && PAGE=='Pengguna') { echo ' class="active"'; } ?>>
				<a href="pengguna.php">
					<span class="da-nav-icon">
						<i class="icon-user"></i>
					</span>
					Pengguna
				</a>
			</li>			
			<?php } ?>
		</ul>
	</div>
					
</div>
