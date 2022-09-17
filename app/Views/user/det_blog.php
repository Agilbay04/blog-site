<!DOCTYPE html>
<html lang="en">

<head>
	<title>My Blog | Baca</title>
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
						<a class="nav-link" href="/homepost">My Blog</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Navbar -->

	<!-- Start Artikel Home -->
	<section class="home-artikel d-flex align-items-center" id="home" data-scroll-index="0">
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
	<!-- End Artikel Home -->

	<!-- Content Artikel-->
	<section class="konten section-padding-artikel" id="artikel">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-4 m-4">
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
				<div class="col-lg-12">
					<div class="card mb-4 card-artikel-detail">
						<div class="card-header">
							<h1 href="#" class="card-title artikel-title"><?= $dt_post["judul"]; ?></h1>
							<p class="text-muted artikel-author">Ditulis oleh <span class="font-weight-bold"><?= $dt_post["nama"]; ?></span>, dipublikasi pada Rabu, 22 Oktober 2021 pukul 10.47</ p>
						</div>
						<img src="/dist/img/<?= $dt_post["gambar"]; ?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text artikel-text">
								<?= $dt_post["isi"]; ?>
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		</div>
	</section>
	<!-- End Content Artikel -->

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
					<p class="copyright-text">&copy; 2021 Grup Riset dan Keahlian V Kecerdasan Buatan JTI - Politeknik Negeri Jember
					<p>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->

	<!-- Start Scroll to top -->
	<div class='ignielToTop' />
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
		(function() {
			var options = {
				whatsapp: "+628978333856", // WhatsApp number
				email: "lab.rsi.jti@polije.ac.id", // Email
				call_to_action: "Ada pertanyaan ?", // Call to action
				button_color: "#467FCF", // Color of button
				position: "right", // Position may be 'right' or 'left'
				order: "whatsapp,email", // Order of buttons
			};
			var proto = document.location.protocol,
				host = "getbutton.io",
				url = proto + "//static." + host;
			var s = document.createElement('script');
			s.type = 'text/javascript';
			s.async = true;
			s.src = url + '/widget-send-button/js/init.js';
			s.onload = function() {
				WhWidgetSendButton.init(host, proto, options);
			};
			var x = document.getElementsByTagName('script')[0];
			x.parentNode.insertBefore(s, x);
		})();
	</script>
	<!-- /GetButton.io widget -->

</body>

</html>