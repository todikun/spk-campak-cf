<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="{{ url('/') }}">
			<span class="align-middle">Diagnosa Campak</span>
		</a>

		<ul class="sidebar-nav">

			<li class="sidebar-item {{Route::is('dashboard') ? 'active' : ''}}">
				<a class="sidebar-link" href="{{route('dashboard')}}">
					<i class="align-middle " data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>

			@if (Auth::user()->is_admin == true)

			<li class="sidebar-header">
				Master Data
			</li>

			<li class="sidebar-item {{Route::is('penyakit.*') ? 'active' : ''}}">
				<a class="sidebar-link" href="{{route('penyakit.index')}}">
					<i class="align-middle " data-feather="book"></i> <span class="align-middle">Kelola Data
						Penyakit</span>
				</a>
			</li>

			<li class="sidebar-item {{Route::is('gejala.*') ? 'active' : ''}}">
				<a class="sidebar-link" href="{{route('gejala.index')}}">
					<i class="align-middle " data-feather="list"></i> <span class="align-middle">Kelola Data
						Gejala</span>
				</a>
			</li>

			<li class="sidebar-item {{Route::is('nilai.*') ? 'active' : ''}}">
				<a class="sidebar-link" href="{{route('nilai.index')}}">
					<i class="align-middle " data-feather="bar-chart-2"></i> <span class="align-middle">Nilai CF</span>
				</a>
			</li>
			@endif

			<li class="sidebar-header">
				Diagnosa
			</li>

			<li class="sidebar-item {{Route::is('diagnosa.*') ? 'active' : ''}}">
				<a class="sidebar-link" href="{{route('diagnosa.index')}}">
					<i class="align-middle " data-feather="activity"></i> <span class="align-middle">Penyakit
						Campak</span>
				</a>
			</li>

	</div>
</nav>