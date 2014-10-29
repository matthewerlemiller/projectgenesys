@extends ('layouts.master')

@section ('content')
	<p>This is the dashboard.</p>

	{{ Form::open(['route' => 'searchMembers', 'id' => 'search-form']) }}
		{{ Form::text('query', '', ['placeholder' => 'Search Members', 'id' => 'query-field']) }}
		{{ Form::submit('Search') }}
	{{ Form::close() }}

	<div class="search-results-container">
		<ul class="search-results-list">
			
		</ul>
	</div>

	<div class="search-status-message">

	</div>

	<a href="{{ route('createMember') }}">Create New Member</a>
	

@stop