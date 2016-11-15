{{-- Sidebar navigation --}}
{{-- Adapted from https://github.com/BlackrockDigital/startbootstrap-simple-sidebar --}}
<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li class="sidebar-brand>
			<a href="{{ route('characters.index') }}">CharDB</a>
		</li>
		@foreach($characters as $character)
			<li>
				<a 
				{{-- Set destination of link --}}
				href={{ route('characters.show', ['id' => $character->id]) }}
				{{-- Show short description as hover text --}}
				title="{{ $character->short_description }}"
				>

					{{-- Displays icon based on sex of character --}}
					<span class="fa" aria-hidden="true">{{ '&#x' . $character->sex_icon . ';'}}</span>

					{{-- Character name --}}
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