<!-- nav-tabs -->
<ul class="site-sidebar-nav nav nav-tabs nav-justified nav-tabs-line" data-plugin="nav-tabs"
role="tablist">
  <li class="active" role="presentation">
    <a data-toggle="tab" href="#sidebar-userlist" title="{{ trans('app.users')}}" role="tab">
     <i class="icon wb-user" aria-hidden="true"></i>
    </a>
  </li>
  <li role="presentation">
    <a data-toggle="tab" title="{{ trans('app.activity')}}" href="#sidebar-activity" role="tab">
      
	   <i class="fa fa-list-alt fa-fw"></i>
    </a>
  </li>
  <li role="presentation">
    <a data-toggle="tab" title="{{ trans('app.settings')}}"  href="#sidebar-setting" role="tab">
      <i class="icon wb-settings" aria-hidden="true"></i>
    </a>
  </li>
</ul>

<div class="site-sidebar-tab-content tab-content">
<!-------------- sart sidebar register users --------------------->
  <div class="tab-pane fade active in" id="sidebar-userlist">
    <div>
      <div>
        <h5 class="clearfix"> {{ trans('app.recent_registered_users')}}  </h5>
       
        <div class="list-group">
		
         @foreach($sidebarusers as $value) 
		  <a class="list-group-item" href="{{URL::to('/dashboard/scouts/accounts/show/')}}/{{$value->id}}" data-toggle="show-chat">
            <div class="media">
              <div class="media-left">
                <div class="avatar avatar-sm avatar-away">
					@if(!$value->image)
						<img src="{{URL::to('/images')}}/default.png" alt="..." />						
					@else
						<img src="{{URL::to('/uploads')}}/{{$value->image}}" alt="..." />
					@endif
                  <i></i>
                </div>
              </div>
              <div class="media-body">
                <h4 class="media-heading">{{$value->first_name}} {{$value->last_name}}</h4>
               <small><time>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->diffForHumans() }}</time></small>
              </div>
            </div>
          </a>
		 @endforeach 
        </div>
		<div class="list-group">
			<a class="list-group-item" href="{{URL::to('/dashboard/scouts/accounts/')}}" style="background-color: #f3f7f9; border-top: 1px solid #e4eaec;">
				<div class="media">
				<div class="media-left">
					 <i class="icon wb-users" aria-hidden="true"></i>
				  </div>
				  <div class="media-body">
					<h4 class="media-heading">{{ trans('app.see_all_users')}} </h4>
				  </div>
				</div>
			  </a>
		</div>
		
              
      </div>
    </div>
  </div>
<!----------------------- end sidebar register user --------------------->
  
<!----------------------- Start sidebar activity --------------------->
  <div class="tab-pane fade" id="sidebar-activity">
    <div>
      <div>
        <h5>{{ trans('app.recent_activity')}}</h5>
        <ul class="timeline timeline-icon timeline-single timeline-simple timeline-feed">
         @foreach($sidebaractivity as $value)
		 <li class="timeline-item">
            <div class="timeline-dot bg-pink-600">
			<div class="avatar avatar-sm avatar-away">
              <img src="{{URL::to('/uploads')}}/{{$value->image}}" alt="..." />
			  </div>
            </div>
			<div class="media-body">
                 <h4 class="media-heading">{{$value->first_name}} {{$value->last_name}}</h4>
				   <small><time>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->diffForHumans() }}</time></small>
				  <p>{{$value->description}}</p>
              </div>           
          </li>
		  @endforeach	

        </ul>
<div class="list-group">
			<a class="list-group-item" href="{{URL::to('/dashboard/activity/')}}" style="background-color: #f3f7f9; border-top: 1px solid #e4eaec;">
				<div class="media">
				<div class="media-left">
					 <i class="icon wb-chat" aria-hidden="true"></i>
				  </div>
				  <div class="media-body">
					<h4 class="media-heading">{{ trans('app.see_all_activity')}} </h4>
				  </div>
				</div>
			  </a>
		</div>		
      </div>
    </div>
  </div>
<!----------------------- end sidebar activity --------------------->

  <div class="tab-pane fade" id="sidebar-setting">
    <div>
      <div>
        <h5>{{ trans('app.general_settings')}} </h5>
        <ul class="list-group">
          
		  <li class="list-group-item">
            <div class="pull-right margin-top-5">
             <p>{{$sidebarsettings->app_title}}</p>
            </div>
            <h5>{{ trans('app.app_title')}}</h5>            
          </li>
		  
		  <li class="list-group-item">
            <div class="pull-right margin-top-5">
             <p>{{$sidebarsettings->app_name}}</p>
            </div>
            <h5>{{ trans('app.app_name')}}</h5>            
          </li>
		  <li class="list-group-item">
            <div class="pull-right margin-top-5">
             <p>{{$sidebarsettings->phone}}</p>
            </div>
            <h5>{{ trans('app.phone')}}</h5>            
          </li>
		  
		  <li class="list-group-item">
            <div class="pull-right margin-top-5">
             <p>{{$sidebarsettings->mobile}}</p>
            </div>
            <h5>{{ trans('app.mobile')}}</h5>            
          </li>
          
        </ul>
      </div>
    </div>
  </div>  
<!----------------------- End sidebar general setting --------------------->
</div>
