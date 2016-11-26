{{-- Sidebar navigation --}}
{{-- Adapted from https://github.com/BlackrockDigital/startbootstrap-simple-sidebar --}}
<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li class="sidebar-brand">
			<a class="brand" href="{{ route('characters.index') }}">CharDB</a>
			<a class="brand light-tooltip-bottom" href="{{ route('characters.create') }}" 
				data-toggle="tooltip" data-placement="bottom" title="Create character">
				<i class="fa fa-user-plus" aria-hidden="true"></i>
			</a>
			<a class="brand light-tooltip-bottom" href="{{ route('relationships.create') }}"
				data-toggle="tooltip" data-placement="bottom" title="Create relationship">
				<i class="fa fa-sitemap" aria-hidden="true"></i>
				<i class="fa fa-plus-circle rel-plus" aria-hidden="true"></i>
			</a>
		</li>
		@foreach($characters as $character)
			<li>
				<a 
				{{-- Set destination of link --}}
				href={{ route('characters.show', ['id' => $character->id]) }}
				>

					{{-- Displays icon based on sex of character, looking up unicode for font-awesome --}}
					<span class="fa" aria-hidden="true">{{ '&#x' . $character->sex_icon . ';'}}</span>

					{{-- Character name --}}
					<span 
					{{-- Show short description as hover text --}}
					class="light-tooltip-right"
					title="{{ $character->short_description }}"
					data-toggle="tooltip" data-placement="right">
						{{ $character->full_name }}
					</span>

					{{-- If there are relationships, display the icon --}}
					<?php $rel_count = $character->relationship_count; ?>
					@if($rel_count > 0)
						 <span 
						 	class="fa fa-sitemap relationship light-tooltip-right"
						 	aria-hidden="true"
						 	data-toggle="tooltip" data-placement="right" 
						 	{{-- Set the tooltip to show the number of relationships --}}
						 	title="{{ $character->first_name }} 
						 		has {{ $rel_count }} 
						 		relationship{{ ($rel_count == 1 ? '' : 's') }}">
						 </span>
					@endif
				</a>
			</li>
		@endforeach
	</ul>
</div>