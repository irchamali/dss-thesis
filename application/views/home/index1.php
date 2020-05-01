<body>

<section class="home" id="home">
	<div class="container text-center">
		<div class="jumbotron mt-4">
			<h1 class="display-4">Welcome to DSS Website</h1>
			<p class="lead">Hallo.. Saya Irham!</p>
			<hr class="my-4">
			<p class="text-center">DSS Web merupakan sebuah sistem pendukung keputusan berbasis website yang telah diintegrasikan dengan metode ELECTRE untuk menyelesaikan perhitungan dalam evaluasi kesesuaian penggunaan lahan pada budidaya padi organik. Pengguna bisa masuk ke sistem dengan (login) atau baca panduan pengguna (guide) terlebih dahulu.</p><br>
			<a class="btn btn-primary" href="<?= base_url('auth'); ?>" type="button">Login</a>
			<a class="btn btn-outline-primary" href="<?= base_url('home'); ?>#guide" type="button">Guide</a>
		</div>
	</div>
</section>

<br><br>

<section class="about" id="about">	
	<div class="container">
		<h1 class="mt-4 text-center">About DSS</h1>
		<hr class="my-4">
		
		<div class="card-columns">
			<div class="card">
				<img src="<?= base_url('assets/'); ?>img/mas_irham.jpg" class="card-img-top" alt="Ircham Ali" width="50%">
				<div class="card-body">
				<h5 class="card-title">Sistem Pendukung Keputusan</h5>
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam, dolorem eligendi consequuntur ex expedita minus ut, commodi totam at molestiae dolorum sed aut minima ea est excepturi corrupti, assumenda exercitationem.</p>
				</div>
			</div>
			<div class="card p-3">
				<blockquote class="blockquote mb-0 card-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
				<footer1 class="blockquote-footer">
					<small class="text-muted">
					Ircham Ali <cite title="Source Title">Source Title</cite>
					</small>
				</footer1>
				</blockquote>
			</div>
			<div class="card">
				<img src="<?= base_url('assets/'); ?>img/mas_irham.jpg" class="card-img-top" alt="Ircham Ali" width="50%">
				<div class="card-body">
				<h5 class="card-title">Decision Support System</h5>
				<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				</div>
			</div>
			<div class="card bg-primary text-white text-center p-3">
				<blockquote class="blockquote mb-0">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
				<footer1 class="blockquote-footer text-white">
					<small>Ircham Ali <cite title="Source Title">Source Title</cite>
					</small>
				</footer1>
				</blockquote>
			</div>
			<div class="card text-center">
				<div class="card-body">
				<h5 class="card-title">Evaluasi Kesesuaian Lahan</h5>
				<p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
				<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				</div>
			</div>
			<div class="card">
			<img src="<?= base_url('assets/'); ?>img/mas_irham.jpg" class="card-img-top" alt="Ircham Ali" width="50%">
			</div>
			<div class="card p-3 text-right">
				<blockquote class="blockquote mb-0">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
				<footer1 class="blockquote-footer">
					<small class="text-muted">
					Ircham Ali <cite title="Source Title">Source Title</cite>
					</small>
				</footer1>
				</blockquote>
			</div>
			<div class="card">
				<div class="card-body">
				<h5 class="card-title">Budidaya Padi Organik</h5>
				<p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
				<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				</div>
			</div>
		</div>
	</div>
</section>

<br><br>
<section class="guide" id="guide">
	<div class="container">
		<h1 class="mt-4 text-center">User Guide</h1>
		<div class="accordion" id="accordionExample">
			<div class="card">
				<div class="card-header text-center" id="headingZero">
					<h5 class="mb-0">
						<strong>Metode ELECTRE (Elimination Et choix tradusiant la realite)</strong> 
					</h5>
				</div>
				<div id="collapseZero" class="collapse show" aria-labelledby="headingZero" data-parent="#accordionExample">
					<div class="card-body text-justify">
						<p>Metode ELECTRE merupakan salah satu metode outranking untuk pengambilan keputusan multi kriteria yang diperkenalkan oleh Bernard Roy pada tahun 1960. Metode ini melibatkan analisis sistematis antar pasangan dari pilihan yang berbeda dan setiap pilihan memiliki skor masing-masing dari serangkaian kriteria evaluasi. Utamanya, ELECTRE digunakan dalam proses perangkingan dari keseluruhan hubungan outranking yang menggunakan index kesesuaian (concordance) dan ketidaksesuaian (discordance) untuk memilih dan menganalisis alternatif terbaik (Rogers dkk., 2000).</p> 
						
						<p>Ada 6 (enam) langkah yang perlu dilalui dalam metode ini. Yok kita coba evaluasi: </p>
						<button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							Langkah #1
						</button>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingOne">
					<h2 class="mb-0">
						<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<strong>#1 Perbandingan berpasangan untuk normalisasi matriks (r)</strong> 
						</button>
					</h2>
				</div>
				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body">
					<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p> 
					
					<p>Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi vitae expedita accusantium, fuga natus voluptate blanditiis porro unde sapiente cumque nemo architecto minima qui esse, dolor, tempora doloremque repellat. Harum.</p>
					<br>
					<button class="btn btn-secondary collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					Langkah #2
					</button>
				</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingTwo">
				<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					<strong>#2 Menentukan bobot(w) dan membentuk matriks preferensi(v)</strong>
					</button>
				</h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				<div class="card-body">
					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
					<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p> 
					<br>
					<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					Langkah #3
					</button>
				</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingThree">
				<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					<strong>#3 Menentukan concordance index(Ckl) dan discordance index(Dkl)</strong>
					</button>
				</h2>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				<div class="card-body">
					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
					<br>
					<button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					Langkah #4
					</button>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingFour">
				<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					<strong>#4 Menghitung matriks concordance(C) dan matriks discordance(D)</strong>
					</button>
				</h2>
				</div>
				<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
				<div class="card-body">
					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
					<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p> 
					<br>
					<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					Langkah #5
					</button>
				</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingFive">
				<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					<strong>#5 Membentuk matriks dominan concordance(f) dan discordance(g)</strong>
					</button>
				</h2>
				</div>
				<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
				<div class="card-body">
					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
					<p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p> 
					<br>
					<button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
					Langkah #6
					</button>
				</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingSix">
				<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
					<strong>#6 Membentuk matriks agregasi dominan(e)</strong>
					</button>
				</h2>
				</div>
				<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
				<div class="card-body">
					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

					<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
					<br>
					<button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
					DONE
					</button>
				</div>
				</div>
			</div>
		</div>
    
	</div>
</section>
<br><br><br><br>
</body>	