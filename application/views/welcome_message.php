<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="author" content="GilcierWeb - Web Developer - gilcierweb@gmail.com - gilcier06@yahoo.com.br - Sites, Sistemas para Web, E-commerce, Manutenção de Sites, Apps Mobile. gilcierweb.com.br"/>

	<title>App CodeIgniter 3</title>

	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50">
<main class="bg-gray-50 h-screen">
	<div class="container mx-auto">

		<section class="bg-gray-50">

			<div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">

				<div class="mx-auto  text-center">
					<div class=" flex  items-center justify-center flex-col">
						<img alt="logo" class="mb-10 object-cover object-center rounded"
							 src="assets/images/logo.png"/>
					</div>
					<h1 class="text-3xl font-extrabold sm:text-5xl">
						App CodeIgniter 3 API.
						<strong class="font-bold text-orange-600 sm:block"> API RESTful com CodeIgniter 3 </strong>
					</h1>

					<p class="mt-4 sm:text-xl/relaxed">
						Em breve estaremos no ar! </p>

					<div class="mt-8 flex flex-wrap justify-center gap-4">
						<a class="block w-full rounded bg-orange-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-orange-700 focus:outline-none focus:ring active:bg-orange-500 sm:w-auto"
						   href="api/users">
							Conheça
						</a>
					</div>
				</div>
			</div>
		</section>

	</div>
</main>

<footer class="mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto ">
	<!-- Grid -->
	<div class="text-center container">
		<div>
			<a class="flex-none text-xl font-semibold text-black dark:text-white" href="/" aria-label="Brand">App CodeIgniter 3</a>
		</div>
		<!-- End Col -->

		<div class="mt-3">
			<p class="text-gray-500 dark:text-neutral-500">
				© <?= date('Y') ?> App CodeIgniter 3.
			</p>
			<p class="text-gray-500 dark:text-neutral-500">Copyright &copy; <?= date('Y') ?> App CodeIgniter - All
				Rights Reserved	- Desenvolvido por: <a href="https://gilcierweb.com.br/gilcierweb" title="GilcierWeb">GilcierWeb</a> -
				Site criado com o Framework	<a href="https://CodeIgniter.com" title="CodeIgniter 3" target="_blank">CodeIgniter 3</a>
			</p>
			<p class="text-gray-500 dark:text-neutral-500">Page rendered in <strong>{elapsed_time}</strong>
				seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
			</p>

		</div>

		<!-- Social Brands -->
		<div class="mt-3 space-x-2">
			<p class="copyright-text">Site melhor visualizado com navegadores modernos como:
				<a href="https://browsehappy.com/" title="Mozilla Firefox" target="_blank">Firefox</a>,
				<a href="https://www.opera.com/" title="Opera" target="_blank">Opera</a>,
				<a href="https://browsehappy.com/" title="Google Chrome" target="_blank">Google Chrome</a>,
				<a href="https://browsehappy.com/" title="Apple Safari" target="_blank">Apple Safari</a>,
				<a href="https://browsehappy.com/" title="Brave" target="_blank" class="">Brave</a>,
				<a href="https://browsehappy.com/" title="Vivaldi" target="_blank" class="">Vivaldi</a>
			</p>
		</div>
		<!-- End Social Brands -->
	</div>
	<!-- End Grid -->
</footer>

</body>
</html>
