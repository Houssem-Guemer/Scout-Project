@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/asrange/asRange.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/uikit/icon.css">
  <!-- Fonts -->
  
  <link rel="stylesheet" href="{{URL::to('/')}}/global/fonts/weather-icons/weather-icons.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  
<div class="page-header">
  <h1 class="page-title font_kufi">Weather Icons </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/icons')}}">Icons</a></li>
		<li class="active">Weather Icons</li>
	</ol>
  </div>
</div> 
<div class="page-content container-fluid">
      <div class="row padding-vertical-30">
        <div class="col-sm-12 text-center">
          <h2>Search from Weather Icons.</h2>
          <form role="search">
            <div class="input-search">
              <input type="text" class="form-control round" placeholder="Search icon...">
              <button type="submit" class="input-search-btn">
                <i class="icon wb-search" aria-hidden="true"></i>
              </button>
            </div>
          </form>
          <div class="margin-bottom-25">
            <div class="asRange" id="icon_change" data-plugin="asRange" data-namespace="rangeUi"
            data-step="1" data-min="16" data-max="64" data-value="24"></div>
            <span id="icon_size">24px</span>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">New v1.3 Icons</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="umbrella">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-umbrella" aria-hidden="true"></i>
                <div class="icon-title">umbrella</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-windy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-windy" aria-hidden="true"></i>
                <div class="icon-title">day-windy</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-cloudy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-cloudy" aria-hidden="true"></i>
                <div class="icon-title">night-alt-cloudy</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="up-left">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-up-left" aria-hidden="true"></i>
                <div class="icon-title">up-left</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="down-right">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-down-right" aria-hidden="true"></i>
                <div class="icon-title">down-right</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-sleet">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-sleet" aria-hidden="true"></i>
                <div class="icon-title">day-sleet</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-sleet">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-sleet" aria-hidden="true"></i>
                <div class="icon-title">night-sleet</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-sleet">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-sleet" aria-hidden="true"></i>
                <div class="icon-title">night-alt-sleet</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="sleet">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-sleet" aria-hidden="true"></i>
                <div class="icon-title">sleet</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-haze">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-haze" aria-hidden="true"></i>
                <div class="icon-title">day-haze</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Moon Phases</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-new">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-new" aria-hidden="true"></i>
                <div class="icon-title">moon-new</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-cresent-1">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-cresent-1" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-cresent-1</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-cresent-2">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-cresent-2" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-cresent-2</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-cresent-3">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-cresent-3" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-cresent-3</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-cresent-4">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-cresent-4" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-cresent-4</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-cresent-5">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-cresent-5" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-cresent-5</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-cresent-6">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-cresent-6" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-cresent-6</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-first-quarter">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-first-quarter" aria-hidden="true"></i>
                <div class="icon-title">moon-first-quarter</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-gibbous-1">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-gibbous-1" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-gibbous-1</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-gibbous-2">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-gibbous-2" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-gibbous-2</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-gibbous-3">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-gibbous-3" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-gibbous-3</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-gibbous-4">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-gibbous-4" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-gibbous-4</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-gibbous-5">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-gibbous-5" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-gibbous-5</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waxing-gibbous-6">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waxing-gibbous-6" aria-hidden="true"></i>
                <div class="icon-title">moon-waxing-gibbous-6</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-full">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-full" aria-hidden="true"></i>
                <div class="icon-title">moon-full</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-gibbous-1">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-gibbous-1" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-gibbous-1</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-gibbous-2">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-gibbous-2" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-gibbous-2</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-gibbous-3">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-gibbous-3" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-gibbous-3</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-gibbous-4">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-gibbous-4" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-gibbous-4</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-gibbous-5">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-gibbous-5" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-gibbous-5</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-gibbous-6">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-gibbous-6" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-gibbous-6</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-3rd-quarter">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-3rd-quarter" aria-hidden="true"></i>
                <div class="icon-title">moon-3rd-quarter</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-crescent-1">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-crescent-1" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-crescent-1</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-crescent-2">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-crescent-2" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-crescent-2</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-crescent-3">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-crescent-3" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-crescent-3</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-crescent-4">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-crescent-4" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-crescent-4</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-crescent-5">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-crescent-5" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-crescent-5</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="moon-waning-crescent-6">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-moon-waning-crescent-6" aria-hidden="true"></i>
                <div class="icon-title">moon-waning-crescent-6</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Clocks</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-12">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-12" aria-hidden="true"></i>
                <div class="icon-title">time-12</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-1">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-1" aria-hidden="true"></i>
                <div class="icon-title">time-1</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-2">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-2" aria-hidden="true"></i>
                <div class="icon-title">time-2</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-3">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-3" aria-hidden="true"></i>
                <div class="icon-title">time-3</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-4">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-4" aria-hidden="true"></i>
                <div class="icon-title">time-4</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-5">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-5" aria-hidden="true"></i>
                <div class="icon-title">time-5</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-6">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-6" aria-hidden="true"></i>
                <div class="icon-title">time-6</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-7">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-7" aria-hidden="true"></i>
                <div class="icon-title">time-7</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-8">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-8" aria-hidden="true"></i>
                <div class="icon-title">time-8</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-9">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-9" aria-hidden="true"></i>
                <div class="icon-title">time-9</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-10">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-10" aria-hidden="true"></i>
                <div class="icon-title">time-10</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="time-11">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-time-11" aria-hidden="true"></i>
                <div class="icon-title">time-11</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Beaufort Wind Scale</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-0">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-0" aria-hidden="true"></i>
                <div class="icon-title">beafort-0</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-1">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-1" aria-hidden="true"></i>
                <div class="icon-title">beafort-1</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-2">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-2" aria-hidden="true"></i>
                <div class="icon-title">beafort-2</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-3">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-3" aria-hidden="true"></i>
                <div class="icon-title">beafort-3</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-4">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-4" aria-hidden="true"></i>
                <div class="icon-title">beafort-4</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-5">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-5" aria-hidden="true"></i>
                <div class="icon-title">beafort-5</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-6">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-6" aria-hidden="true"></i>
                <div class="icon-title">beafort-6</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-7">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-7" aria-hidden="true"></i>
                <div class="icon-title">beafort-7</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-8">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-8" aria-hidden="true"></i>
                <div class="icon-title">beafort-8</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-9">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-9" aria-hidden="true"></i>
                <div class="icon-title">beafort-9</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-10">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-10" aria-hidden="true"></i>
                <div class="icon-title">beafort-10</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-11">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-11" aria-hidden="true"></i>
                <div class="icon-title">beafort-11</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="beafort-12">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-beafort-12" aria-hidden="true"></i>
                <div class="icon-title">beafort-12</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Wind Directions - 0 degrees through 345 degrees</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _0-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _0-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _0-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _15-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _15-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _15-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _30-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _30-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _30-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _45-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _45-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _45-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _60-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _60-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _60-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _75-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _75-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _75-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _90-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _90-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _90-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _105-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _105-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _105-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _120-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _120-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _120-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _135-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _135-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _135-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _150-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _150-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _150-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _165-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _165-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _165-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _180-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _180-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _180-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _195-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _195-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _195-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _210-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _210-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _210-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _225-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _225-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _225-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _240-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _240-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _240-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _255-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _255-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _255-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _270-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _270-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _270-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _285-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _285-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _285-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _300-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _300-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _300-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _315-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _315-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _315-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _330-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _330-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _330-deg</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wind-default _345-deg">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-wind-default _345-deg" aria-hidden="true"></i>
                <div class="icon-title">wind-default _345-deg</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">New v1.2</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="smoke">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-smoke" aria-hidden="true"></i>
                <div class="icon-title">smoke</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="dust">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-dust" aria-hidden="true"></i>
                <div class="icon-title">dust</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="snow-wind">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-snow-wind" aria-hidden="true"></i>
                <div class="icon-title">snow-wind</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-snow-wind">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-snow-wind" aria-hidden="true"></i>
                <div class="icon-title">day-snow-wind</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-snow-wind">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-snow-wind" aria-hidden="true"></i>
                <div class="icon-title">night-snow-wind</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-snow-wind">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-snow-wind" aria-hidden="true"></i>
                <div class="icon-title">night-alt-snow-wind</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-sleet-storm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-sleet-storm" aria-hidden="true"></i>
                <div class="icon-title">day-sleet-storm</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-sleet-storm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-sleet-storm" aria-hidden="true"></i>
                <div class="icon-title">night-sleet-storm</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-sleet-storm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-sleet-storm" aria-hidden="true"></i>
                <div class="icon-title">night-alt-sleet-storm</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-snow-thunderstorm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-snow-thunderstorm" aria-hidden="true"></i>
                <div class="icon-title">day-snow-thunderstorm</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-snow-thunderstorm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-snow-thunderstorm" aria-hidden="true"></i>
                <div class="icon-title">night-snow-thunderstorm</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-snow-thunderstorm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-snow-thunderstorm" aria-hidden="true"></i>
                <div class="icon-title">night-alt-snow-thunderstorm</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="solar-eclipse">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-solar-eclipse" aria-hidden="true"></i>
                <div class="icon-title">solar-eclipse</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="lunar-eclipse">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-lunar-eclipse" aria-hidden="true"></i>
                <div class="icon-title">lunar-eclipse</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="meteor">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-meteor" aria-hidden="true"></i>
                <div class="icon-title">meteor</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="hot">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-hot" aria-hidden="true"></i>
                <div class="icon-title">hot</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="hurricane">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-hurricane" aria-hidden="true"></i>
                <div class="icon-title">hurricane</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="smog">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-smog" aria-hidden="true"></i>
                <div class="icon-title">smog</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="alien">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-alien" aria-hidden="true"></i>
                <div class="icon-title">alien</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="snowflake-cold">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-snowflake-cold" aria-hidden="true"></i>
                <div class="icon-title">snowflake-cold</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="stars">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-stars" aria-hidden="true"></i>
                <div class="icon-title">stars</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-partly-cloudy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-partly-cloudy" aria-hidden="true"></i>
                <div class="icon-title">night-partly-cloudy</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Day / Sunny</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-cloudy-gusts">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-cloudy-gusts" aria-hidden="true"></i>
                <div class="icon-title">day-cloudy-gusts</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-cloudy-windy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-cloudy-windy" aria-hidden="true"></i>
                <div class="icon-title">day-cloudy-windy</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-cloudy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-cloudy" aria-hidden="true"></i>
                <div class="icon-title">day-cloudy</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-fog">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-fog" aria-hidden="true"></i>
                <div class="icon-title">day-fog</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-hail">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-hail" aria-hidden="true"></i>
                <div class="icon-title">day-hail</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-lightning">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-lightning" aria-hidden="true"></i>
                <div class="icon-title">day-lightning</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-rain-mix">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-rain-mix" aria-hidden="true"></i>
                <div class="icon-title">day-rain-mix</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-rain-wind">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-rain-wind" aria-hidden="true"></i>
                <div class="icon-title">day-rain-wind</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-rain">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-rain" aria-hidden="true"></i>
                <div class="icon-title">day-rain</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-showers">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-showers" aria-hidden="true"></i>
                <div class="icon-title">day-showers</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-snow">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-snow" aria-hidden="true"></i>
                <div class="icon-title">day-snow</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-sprinkle">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-sprinkle" aria-hidden="true"></i>
                <div class="icon-title">day-sprinkle</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-sunny-overcast">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-sunny-overcast" aria-hidden="true"></i>
                <div class="icon-title">day-sunny-overcast</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-sunny">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-sunny" aria-hidden="true"></i>
                <div class="icon-title">day-sunny</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-storm-showers">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-storm-showers" aria-hidden="true"></i>
                <div class="icon-title">day-storm-showers</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="day-thunderstorm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-day-thunderstorm" aria-hidden="true"></i>
                <div class="icon-title">day-thunderstorm</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Neutral / Cloudy</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="cloudy-gusts">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-cloudy-gusts" aria-hidden="true"></i>
                <div class="icon-title">cloudy-gusts</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="cloudy-windy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-cloudy-windy" aria-hidden="true"></i>
                <div class="icon-title">cloudy-windy</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="cloudy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-cloudy" aria-hidden="true"></i>
                <div class="icon-title">cloudy</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="fog">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-fog" aria-hidden="true"></i>
                <div class="icon-title">fog</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="hail">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-hail" aria-hidden="true"></i>
                <div class="icon-title">hail</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="lightning">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-lightning" aria-hidden="true"></i>
                <div class="icon-title">lightning</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="rain-mix">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-rain-mix" aria-hidden="true"></i>
                <div class="icon-title">rain-mix</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="rain-wind">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-rain-wind" aria-hidden="true"></i>
                <div class="icon-title">rain-wind</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="rain">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-rain" aria-hidden="true"></i>
                <div class="icon-title">rain</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="showers">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-showers" aria-hidden="true"></i>
                <div class="icon-title">showers</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="snow">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-snow" aria-hidden="true"></i>
                <div class="icon-title">snow</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="sprinkle">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-sprinkle" aria-hidden="true"></i>
                <div class="icon-title">sprinkle</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="storm-showers">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-storm-showers" aria-hidden="true"></i>
                <div class="icon-title">storm-showers</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="thunderstorm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-thunderstorm" aria-hidden="true"></i>
                <div class="icon-title">thunderstorm</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Night / Moons</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-cloudy-gusts">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-cloudy-gusts" aria-hidden="true"></i>
                <div class="icon-title">night-alt-cloudy-gusts</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-cloudy-windy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-cloudy-windy" aria-hidden="true"></i>
                <div class="icon-title">night-alt-cloudy-windy</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-hail">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-hail" aria-hidden="true"></i>
                <div class="icon-title">night-alt-hail</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-lightning">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-lightning" aria-hidden="true"></i>
                <div class="icon-title">night-alt-lightning</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-rain-mix">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-rain-mix" aria-hidden="true"></i>
                <div class="icon-title">night-alt-rain-mix</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-rain-wind">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-rain-wind" aria-hidden="true"></i>
                <div class="icon-title">night-alt-rain-wind</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-rain">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-rain" aria-hidden="true"></i>
                <div class="icon-title">night-alt-rain</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-showers">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-showers" aria-hidden="true"></i>
                <div class="icon-title">night-alt-showers</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-snow">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-snow" aria-hidden="true"></i>
                <div class="icon-title">night-alt-snow</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-sprinkle">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-sprinkle" aria-hidden="true"></i>
                <div class="icon-title">night-alt-sprinkle</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-storm-showers">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-storm-showers" aria-hidden="true"></i>
                <div class="icon-title">night-alt-storm-showers</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-alt-thunderstorm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-alt-thunderstorm" aria-hidden="true"></i>
                <div class="icon-title">night-alt-thunderstorm</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-clear">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-clear" aria-hidden="true"></i>
                <div class="icon-title">night-clear</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-cloudy-gusts">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-cloudy-gusts" aria-hidden="true"></i>
                <div class="icon-title">night-cloudy-gusts</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-cloudy-windy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-cloudy-windy" aria-hidden="true"></i>
                <div class="icon-title">night-cloudy-windy</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-cloudy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-cloudy" aria-hidden="true"></i>
                <div class="icon-title">night-cloudy</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-hail">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-hail" aria-hidden="true"></i>
                <div class="icon-title">night-hail</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-lightning">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-lightning" aria-hidden="true"></i>
                <div class="icon-title">night-lightning</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-rain-mix">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-rain-mix" aria-hidden="true"></i>
                <div class="icon-title">night-rain-mix</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-rain-wind">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-rain-wind" aria-hidden="true"></i>
                <div class="icon-title">night-rain-wind</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-rain">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-rain" aria-hidden="true"></i>
                <div class="icon-title">night-rain</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-showers">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-showers" aria-hidden="true"></i>
                <div class="icon-title">night-showers</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-snow">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-snow" aria-hidden="true"></i>
                <div class="icon-title">night-snow</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-sprinkle">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-sprinkle" aria-hidden="true"></i>
                <div class="icon-title">night-sprinkle</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-storm-showers">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-storm-showers" aria-hidden="true"></i>
                <div class="icon-title">night-storm-showers</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-thunderstorm">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-thunderstorm" aria-hidden="true"></i>
                <div class="icon-title">night-thunderstorm</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Miscellaneous Weather</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="celsius">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-celsius" aria-hidden="true"></i>
                <div class="icon-title">celsius</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="cloud-down">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-cloud-down" aria-hidden="true"></i>
                <div class="icon-title">cloud-down</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="cloud-refresh">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-cloud-refresh" aria-hidden="true"></i>
                <div class="icon-title">cloud-refresh</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="cloud-up">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-cloud-up" aria-hidden="true"></i>
                <div class="icon-title">cloud-up</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="cloud">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-cloud" aria-hidden="true"></i>
                <div class="icon-title">cloud</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="degrees">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-degrees" aria-hidden="true"></i>
                <div class="icon-title">degrees</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="down-left">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-down-left" aria-hidden="true"></i>
                <div class="icon-title">down-left</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="down">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-down" aria-hidden="true"></i>
                <div class="icon-title">down</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="fahrenheit">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-fahrenheit" aria-hidden="true"></i>
                <div class="icon-title">fahrenheit</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="horizon-alt">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-horizon-alt" aria-hidden="true"></i>
                <div class="icon-title">horizon-alt</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="horizon">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-horizon" aria-hidden="true"></i>
                <div class="icon-title">horizon</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="left">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-left" aria-hidden="true"></i>
                <div class="icon-title">left</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="lightning">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-lightning" aria-hidden="true"></i>
                <div class="icon-title">lightning</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="night-fog">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-night-fog" aria-hidden="true"></i>
                <div class="icon-title">night-fog</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="refresh-alt">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-refresh-alt" aria-hidden="true"></i>
                <div class="icon-title">refresh-alt</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="refresh">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-refresh" aria-hidden="true"></i>
                <div class="icon-title">refresh</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="right">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-right" aria-hidden="true"></i>
                <div class="icon-title">right</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="sprinkles">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-sprinkles" aria-hidden="true"></i>
                <div class="icon-title">sprinkles</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="strong-wind">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-strong-wind" aria-hidden="true"></i>
                <div class="icon-title">strong-wind</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="sunrise">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-sunrise" aria-hidden="true"></i>
                <div class="icon-title">sunrise</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="sunset">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-sunset" aria-hidden="true"></i>
                <div class="icon-title">sunset</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="thermometer-exterior">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-thermometer-exterior" aria-hidden="true"></i>
                <div class="icon-title">thermometer-exterior</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="thermometer-internal">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-thermometer-internal" aria-hidden="true"></i>
                <div class="icon-title">thermometer-internal</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="thermometer">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-thermometer" aria-hidden="true"></i>
                <div class="icon-title">thermometer</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="tornado">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-tornado" aria-hidden="true"></i>
                <div class="icon-title">tornado</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="up-right">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-up-right" aria-hidden="true"></i>
                <div class="icon-title">up-right</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="up">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-up" aria-hidden="true"></i>
                <div class="icon-title">up</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="windy">
              <div class="icondemo vertical-align-middle">
                <i class="icon wi-windy" aria-hidden="true"></i>
                <div class="icon-title">windy</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<br/>
	
	@stop
	