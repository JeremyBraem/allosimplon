<body>
	<nav class="relative px-4 py-4 flex justify-between items-center bg-[#FCFCFC]">
		<a class="font-bold leading-none" href="#">
			<img src="asset/img/AlloSimplonTR.png" class="w-20">
		</a>
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-black p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
			<li><a class="text-sm text-black hover:text-[#694AA6]" href="#">Accueil</a></li>
			<li><a class="text-sm text-black hover:text-[#694AA6]" href="#">Films</a></li>
			<li><a class="text-sm text-black hover:text-[#694AA6]" href="#">Contact</a></li>
			<li><a class="text-sm text-black hover:text-[#694AA6]" href="#">Inscription</a></li>
			<li><a class="text-sm text-black hover:text-[#694AA6]" href="#">Connexion</a></li>
		</ul>
	</nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 right-0 bottom-0 flex flex-col text-right w-5/6 max-w-sm py-5 px-9 bg-[#8666C6] border-r overflow-y-auto">
			<div>
				<ul>
					<li class="">
						<a class="block border-b p-4 text-sm text-[#FCFCFC]" href="#">Accueil</a>
					</li>
					<li class="">
						<a class="block border-b p-4 text-sm text-[#FCFCFC]" href="#">Films</a>
					</li>
					<li class="">
						<a class="block border-b p-4 text-sm text-[#FCFCFC]" href="#">Contact</a>
					</li>
					<li class="">
						<a class="block border-b p-4 text-sm text-[#FCFCFC]" href="#">Connexion</a>
					</li>
					<li class="">
						<a class="block border-b p-4 text-sm text-[#FCFCFC]" href="#">Inscription</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<script src="asset/js/navbar.js"></script>
</body>