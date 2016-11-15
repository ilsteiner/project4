{{-- Sidebar navigation --}}
{{-- Adapted from https://github.com/BlackrockDigital/startbootstrap-simple-sidebar --}}
<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li class="sidebar-brand>
			<a href="{{ route('characters.index') }}">CharDB</a>
		</li>
		@foreach($characters as $character)
			<li>
				<a href={{ route('characters.show', ['id' => $character->id]) }}>
					<span class="fa" aria-hidden="true">{{ '&#x' . $character->sex_icon . ';'}}</span>
					 {{ $character->full_name }}

					{{-- If there are relationships, display the icon --}}
					@if($character->relationship_count > 0)
						 <span class="fa fa-sitemap relationship" aria-hidden="true"></span>
					@endif
				</a>
			</li>
		@endforeach
	</ul>
</div>