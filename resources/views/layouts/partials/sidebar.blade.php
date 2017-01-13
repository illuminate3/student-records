@if(Auth::user()->hasRole('admin'))
	<div class="panel panel-default">
		<div class="panel-heading">
			School Management Section
		</div>
		<div class="panel-body">
			<div class="boxed-group-inner">
				<ul class="mini-class-list js-class-list">
					<li><a href="{{ url('/teachers') }}">Teachers</a></li>
					<li><a href="{{ url('/students') }}">Students</a></li>
					<li><a href="{{ url('/grades')}}">Grades</a></li>
					<li class="hidden"><a href="">Subjects</a></li>
				</ul>
			</div>
		</div>
	</div>
@endif

@if(Auth::user()->hasRole('teacher'))
  <div class="panel panel-default">
    <div class="panel-heading">Teacher Sections</div>
    <div class="panel-body">
      <div class="boxed-group-inner">
        Class Assigned with subject
        <ul class="mini-class-list js-class-list">
          @foreach($teachers as $teacher)
			<li><a href="{{ route('quarter.show',[$teacher->grade[0]->slug,$teacher->subject->name]) }}">{{ $teacher->subject->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  @endif

  @if(Auth::user()->hasRole('class_teacher'))
  <div class="panel with-nav-tabs panel-default">
	  <div class="tabbable-panel">
		  <div class="tabbable-line">
			  <ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#class_section" data-toggle="tab">Class Section</a></li>
				  <li><a href="#teachers" data-toggle="tab">Teachers</a></li>
			  </ul>
			  <div class="tab-content">
				  <div class="tab-pane active" id="class_section">
					  <div class="boxed-group-inner">
			            <ul class="mini-class-list js-class-list">
			  			 {{ $grade->slug }} profile
			              <li><a href="{{ route('grade.show',$grade->slug) }}">{{ $grade->slug }}</a></li>
			  			Class Attendance
			  			<li><a href="#">Attendance for {{ $grade->slug }}</a></li>
			            </ul>
			          </div>
				  </div>
				  <div class="tab-pane" id="teachers">
					  <div class="boxed-group-inner container">
			            Teachers with their assaigned subjects
			            <ul class="mini-class-list js-class-list">
			              @foreach($grade->teacher as $teacher)
			  				<li class="col-xs-12 col-sm-8 col-md-12">
			  					<svg aria-hidden="true" class="octicon octicon-repo" height="16" version="1.1" viewBox="0 0 12 16" width="12">
			  					<path d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path></svg>
			  					<span class="author" itemprop="author">
			  						@if ($teacher->user)
			  							<a href="#" class="url link" rel="author">{{$teacher->user->username}}</a>
			  							@else
			  							<span class="badge" title="No Assigned Subject Teacher Yet!" data-toggle="tooltip" data-placement="top">N A</span>
			  						@endif
			  					</span>
			  					<span class="path-divider">/</span>
			  					<strong>
			  						@if ($teacher->subject)
			  							<a href="#">{{ $teacher->subject->name }} </a>
			  							@else
			  							<span class="badge" title="No Assigned Subject Yet!" data-toggle="tooltip" data-placement="top">N A</span>
			  						@endif
			  					</strong>
			  				</li>
			              @endforeach
			            </ul>
			          </div>
				  </div>
			  </div>
		  </div>
	  </div>
  </div>
  @endif
