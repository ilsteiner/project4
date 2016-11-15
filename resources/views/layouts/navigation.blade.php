{{-- Sidebar navigation --}}
{{-- Adapted from https://github.com/BlackrockDigital/startbootstrap-simple-sidebar --}}
<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		@foreach($characters as $character)
			<li>
				<a href={{ route('characters.show', ['id' => $character.id]) }}>
					{{ $character.displayName() }}
				</a>
			</li>
		@endforeach
	</ul>
</div>