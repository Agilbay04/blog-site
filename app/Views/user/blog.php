<!DOCTYPE html>
<html lang="en">
<head>
<title>My Blog | Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- owl carousel css --> 
<link rel="stylesheet" href="/landing/css/owl.carousel.min.css"> 
<!-- font awesome icons --> 
<link rel="stylesheet" href="/landing/css/font-awesome.css"> 
<!-- bootstrap css --> 
<link rel="stylesheet" href="/landing/css/bootstrap.min.css"> 
<!-- main css -->
<link rel="stylesheet" href="/landing/css/style.css">
<!-- main scss -->
<link rel="stylesheet/less" type="text/css" href="/landing/scss/style.scss" />
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
	<div class="container">
		<a class="navbar-brand" href="index.html">
			<h3 class="title">My Blog</h3>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars"></i>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="/post">My Blog</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- End Navbar -->

<!-- Start Artikel Home -->
<section class="home-artikel d-flex align-items-center" id="home">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-7">
				<div class="home-artikel-text">
					<h1>My Blog</h1>
					<h2>Kumpulan Blog dan Artikel</h2>
					<div class="dropdown-divider"></div>
					<p>Lorem ipsum dolor sit amet <br>
					Lorem ipsum dolor sit amet consectetur <br>
					Lorem ipsum dolor sit amet consectetur adipisicing.
					</p>
				</div>
			</div>
			<div class="col-md-5 text-center">
				<div class="home-artikel-img">
					<!-- <div class="circle"></div> -->
					<img src="/dist/img/AdminLTELogo.png" alt="polije">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End artikel Home -->

<!-- Content artikel-->
<section class="artikel section-padding" id="artikel">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-title">
                    <h2>
                        <i class="fas fa-newspaper pr-2"></i>
                        Semua <span>Artikel</span>
                    </h2>
                </div>
            </div>
            <div class="col-lg-5 mb-4">
				<div class="newslater-form">
					<form action="" method="POST">
						<div class="form-group-newslater text-center">
							<div class="d-flex align-items-center">
								<input type="text" name="email" id="" placeholder="Cari artikel..." class="form-control mr-3" autocomplete="off" required>
								<button class="btn btn-circle ml-auto">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
				<?php foreach ($dt_post as $row) : ?>
                <div class="card mb-4 card-artikel">
                    <img src="/dist/img/<?= $row["gambar"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="/landing/pages/det_artikel.html" class="card-title artikel-title" style="text-decoration: none;"><?= $row["judul"]; ?></a>
                        <hr>
                        <p class="card-text artikel-text">
							<?= $row["isi"]; ?>
                            <a href="/det_post/<?= $row["slug"]; ?>" class="font-weight-bold" style="text-decoration: none;">baca selengkapnya</a>
                        </p>
						<div class="widget d-flex">
							<div class="widget-list mr-3">
								<p class="card-text">
									<small class="text-muted">
										<i class="fas fa-user mr-1"></i>
										<?= $row["nama"]; ?>
									</small>
								</p>
							</div>
							<div class="widget-list mr-3">
								<p class="card-text">
									<small class="text-muted">
										<i class="fas fa-calendar mr-1"></i>
										<?= date("d M Y", strtotime($row["created_at"])); ?>
									</small>
								</p>
							</div>
						</div>
                    </div>
                </div>
				<?php endforeach; ?>

				<!-- <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link text-color-1" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link text-color-1" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link text-color-1" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link text-color-1" href="#">Next</a>
                        </li>
                    </ul>
                </nav> -->
            </div>
            <div class="col-lg-5">
				

				<!-- Kategori -->
                <div class="card card-kategori mb-4">
                    <h5 class="card-header font-weight-bold">
                        <i class="fas fa-folder text-color-1 pr-2"></i> 
						Kategori
                    </h5>
                    <div class="card-body">
						<?php foreach ($dt_ktg as $row) : ?>
                        <div class="card kategori-item shadow-sm mb-2">
                            <div class="card-body p-2">
                                <a href="#" class="kategori" style="text-decoration: none; color: var(--black-400); font-weight: 600;">
                                    <i class="fas fa-folder-open pr-2"> </i> 
                                    <?= $row["kategori"]; ?>
                                </a>
                            </div>
                        </div>
						<?php endforeach; ?>
                    </div>
                </div>
				<!-- End kategori -->

				<!-- Populer -->
				<div class="card card-kategori mb-4">
                    <h5 class="card-header font-weight-bold">
                        <i class="fas fa-tv text-color-1 pr-2"></i> 
						Post Terkini
                    </h5>
                    <div class="card-body">
						<?php foreach ($dt_post as $row) : ?>
						<div class="populer-card mb-2">
							<div class="meta">
								<div class="photo" style="background-image: url(/dist/img/<?= $row['gambar']; ?>)"></div>
								<ul class="details">
									<li class="author">
										<a href="#">
											<i class="fas fa-user"></i>
											<?= $row["nama"]; ?>
										</a>
									</li>
									<li class="date">
										<i class="fas fa-calendar"></i>
										<?= date("d M Y", strtotime($row["created_at"])); ?>
									</li>
								</ul>
							</div>
							<div class="description">
								<h1><?= $row["judul"]; ?></h1>
								<!-- <h2>Opening a door to the future</h2> -->
								<p class="read-more">
									<a class="text-decoration-none" href="/det_post/<?= $row["slug"]; ?>">Baca</a>
								</p>
							</div>
						</div>
						<?php endforeach; ?>
                    </div>
                </div>
				<!-- End populer -->

            </div>
        </div>
    </div>
</section>
<!-- End Content artikel -->

<!-- Start Footer -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="footer-col">
					<h3>GARIS V Kecerdasan Buatan</h3>
					<ul>
						<li><a href="pages/tentang.html"> Tentang</a></li>
						<li><a href="#" data-scroll-goto="7"> Faq</a></li>
						<li><a href="#"> Join Us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-col">
					<div class="footer-col">
						<h3>Menu Utama</h3>
						<div class="row">
							<div class="col-lg-4">
								<ul>
									<li><a href="index.html">Beranda</a></li>
									<li><a href="#" data-scroll-goto="1">VLMS</a></li>
									<li><a href="#" data-scroll-goto="3">Projek</a></li>
									<li><a href="#" data-scroll-goto="7">Kontak</a></li>
								</ul>
							</div>
							<div class="col-lg-8">
								<ul>
									<li><a href="pages/eresources.html">E-Resources</a></li>
									<li><a href="#">Produk & Aplikasi</a></li>
									<li><a href="pages/artikel.html">Artikel</a></li>
									<li><a href="#">Foto Kegiatan</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-col">
					<h3>Privasi dan Policy</h3>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid adipisci.
					</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-col">
					<h3>Sosial Media</h3>
					<ul>
						<li><a href="https://www.facebook.com/jtipolije" target="_blank"><i class="fab fa-facebook-square"></i> Facebook</a></li>
						<li><a href="https://www.youtube.com/channel/UCyjE1iZi_oXfVqJFzlM-WAQ" target="_blank"><i class="fab fa-youtube-square"></i> Youtube</a></li>
						<li><a href="#"><i class="fab fa-whatsapp-square" target="_blank"></i> WhatsApp</a></li>
						<li><a href="https://www.instagram.com/jtipolije/" target="_blank"><i class="fab fa-instagram-square"></i> Istagram</a></li>
						<li><a href="jti1@polije.ac.id" target="_blank"><i class="fas fa-envelope-square"></i> Email</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p class="copyright-text">&copy; 2021 Grup Riset dan Keahlian V Kecerdasan Buatan JTI - Politeknik Negeri Jember<p>
			</div>
		</div>
	</div>
</footer>
<!-- End Footer -->

<!-- Start Scroll to top -->
<div class='ignielToTop'/>
<!-- End Scroll to top -->

<!-- jquery js -->
<script src="/landing/js/jquery.min.js"></script>
<!-- popper js -->
<script src="/landing/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="/landing/js/bootstrap.min.js"></script>
<!-- owl carousel js -->
<script src="/landing/js/owl.carousel.min.js"></script>
<!-- ScrollIt js -->
<script src="/landing/js/scrollIt.min.js"></script>
<!-- main js -->
<script src="/landing/js/main.js"></script>

<!-- Scroll to top javascript -->
<script>
	$(document).scroll(function() {
		return $(document).scrollTop() > 300 ? $('.ignielToTop').addClass('show') : $('.ignielToTop').removeClass('show')
		}), $('.ignielToTop').click(function() {
			return $('html,body').animate({
				scrollTop: '0'
			});
	});
</script>
<!-- Scroll to top javascript -->

<!-- GetButton.io widget -->
<script type="text/javascript">
	(function () {
			var options = {
					whatsapp: "+628978333856", // WhatsApp number
					email: "lab.rsi.jti@polije.ac.id", // Email
					call_to_action: "Ada pertanyaan ?", // Call to action
					button_color: "#467FCF", // Color of button
					position: "right", // Position may be 'right' or 'left'
					order: "whatsapp,email", // Order of buttons
			};
			var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
			var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
			s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
			var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
	})();
</script>
<!-- /GetButton.io widget -->

</body>
</html>
