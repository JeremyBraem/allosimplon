<body>
	<nav class="relative px-3 py-2 md:px-4 md:py-3 flex items-center bg-[#FCFCFC]">
		<a class="font-bold leading-none" href="index.php">
			<img src="asset/img/AlloSimplonTR.png" class="md:w-20">
		</a>
		<form class="px-3 md:px-28 md:pl-44">
			<div class="relative">
				<div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
					<svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
				</div>
				<input class="p-1 w-40 pr-8 md:w-96 md:p-2 md:pr-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50" required>
			</div>
		</form>
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-black p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden lg:flex lg:items-center lg:w-auto lg:space-x-6 pl-10 pr-20">
			<li><a class="text-sm text-black hover:text-[#694AA6]" href="#">Accueil</a></li>
			<li>
				<div class="group inline">
					<a class="text-sm text-black hover:text-[#694AA6]" href="#">Films ▼</a>
					<ul class="absolute hidden text-gray-700 pt-1 group-hover:block shadow">
						<li class="">
							<a class="bg-[#694AA6] text-[#FCFCFC] py-2 px-5 block">Catégories</a>
						</li>
						<li class="">
							<a class="bg-[#FCFCFC] hover:bg-gray-100 py-1 px-4 block" href="#">Action</a>
						</li>
						<li class="">
							<a class="bg-[#FCFCFC] hover:bg-gray-100 py-1 px-4 block" href="#">Aventure</a>
						</li>
					</ul>
      			</div>
			</li>
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
					<li>
						<div class="group inline">
							<a class="block border-b py-4 px-2 text-sm text-[#FCFCFC]">▼ Films</a>
							<ul class="absolute hidden text-gray-700 group-hover:block shadow right-0 pr-10">
								<li class="">
									<a class="bg-[#694AA6] text-[#FCFCFC] py-2 px-5 block">Catégories</a>
								</li>
								<li class="">
									<a class="bg-[#FCFCFC] hover:bg-gray-100 py-1 px-4 block" href="#">Action</a>
								</li>
								<li class="">
									<a class="bg-[#FCFCFC] hover:bg-gray-100 py-1 px-4 block" href="#">Aventure</a>
								</li>
							</ul>
						</div>
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