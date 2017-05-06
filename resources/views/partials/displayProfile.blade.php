<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="text-center">
			{{ $user->name }}'s profile.						
		</h4>
	</div>
	<div class="panel-body">
		<p class="text-center">
			<img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}'s picture" width="140px" height="140px" style="border-radius: 50%;">
		</p>
		<p class="text-center">
			{{ $user->profile->location }}
		</p>
	</div>

	@if(\Auth::user()->is_user($user->id))
	<div>
		<center>
			<a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg">Update Profile</a>
		</center>
	</div>
	@endif
	
</div>

<div class="panel panel-default">
	<div class="body">
		<friend></friend>
	</div>
</div>

@if($user->profile->about)
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="text-center">
				About.						
			</h4>
		</div>
		<div class="panel-body">
			<p>
				{{ $user->profile->about }}
			</p>
		</div>
	</div>
@endif

<!-- @todo: know how best to display the users profile -->
@if($user->profile->religion)
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="text-center">
			{{ $user->name }}'s Life.			
		</h4>
	</div>
	<div class="panel-body">
		<div>
			<p>{{ $user->name }} is a <strong>{{ $user->profile->religion }}</strong></p>
		</div>
		@if($user->profile->hometown)
		<div>
			<p> @include('partials.gender') is from <strong>{{ $user->profile->hometown }}</strong></p>
		</div>
		@endif


		<div>
			<p> @include('partials.gender') Attended High School at <strong>{{ $user->profile->high_school_name }} </strong> at the year <strong>{{ \Carbon\Carbon::parse($user->profile->started_school_at)->year }}</strong></p>
		</div>
		<div>
			<p> Completed High School at the year <strong>{{ \Carbon\Carbon::parse($user->profile->completed_school_at)->year }}</strong></p>
		</div>
		<div>
			
		</div>
	</div>
</div>
@endif
