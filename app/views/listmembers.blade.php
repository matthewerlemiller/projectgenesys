@extends ('layouts.master')

@section ('content')
	<p>This is the list members page</p>
	@foreach ($members as $member)
		<p><a href="{{ route('viewMember', ['id' => $member->id])}}">{{{ $member->NameFirst . " " . $member->NameLast }}}</a></p>

	@endforeach


@stop