@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/plyr/plyr.css">
   
<div class="page-header">
  <h1 class="page-title font_kufi">Timeline </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">Timeline</li>
	</ol>
  </div>
</div> 
  <div class="page-content container">
      <!-- Timeline -->
      <ul class="timeline timeline-icon">
        <li class="timeline-period">MAY 2016</li>
        <li class="timeline-item">
          <div class="timeline-dot">
            <i class="icon wb-image" aria-hidden="true"></i>
          </div>
          <div class="timeline-info">
            <time datetime="2016-05-15">2 Days ago</time>
          </div>
          <div class="timeline-content">
            <div class="widget widget-article widget-shadow">
              <div class="widget-header cover">
                <img class="cover-image" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
              </div>
            </div>
          </div>
        </li>
        <li class="timeline-item timeline-reverse">
          <div class="timeline-dot bg-green-500">
            <i class="icon wb-file" aria-hidden="true"></i>
          </div>
          <div class="timeline-info">
            <time datetime="2016-05-15">2 Days ago</time>
          </div>
          <div class="timeline-content">
            <div class="widget widget-article widget-shadow">
              <div class="widget-header cover">
                <img class="cover-image" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
              </div>
              <div class="widget-body">
                <h3 class="widget-title">Lorem Ipsum Dolor</h3>
                <p class="widget-metas">
                  <span class="widget-time">MAY 15, 2016</span>
                </p>
                <p>Novum formidines congressus atomorum nam permulta alterum delectatio
                  gaudeat statim. Necessariae dicturam perspexit utrum modo amicitiae
                  malum summumque, multis ante iudicia desiderat, civitas iudicare
                  attingere, amori perpaulum mediocrium, dicere notae litteras
                  plusque appareat, remotis fama futurove quandam assentiar integre
                  poenis. </p>
                <div class="widget-body-footer">
                  <div class="widget-actions pull-right">
                    <a href="javascript:void(0)">
                      <i class="icon wb-chat-working" aria-hidden="true"></i>
                      <span>2500</span>
                    </a>
                    <a href="javascript:void(0)">
                      <i class="icon wb-heart" aria-hidden="true"></i>
                      <span>20</span>
                    </a>
                  </div>
                  <a class="btn btn-primary btn-outline" href="javascript:void(0)">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="timeline-item">
          <div class="timeline-dot bg-orange-500">
            <i class="wb-quote-right"></i>
          </div>
          <div class="timeline-info">
            <time datetime="2016-05-08">9 Days ago</time>
          </div>
          <div class="timeline-content">
            <div class="widget widget-article widget-shadow">
              <div class="widget-header cover">
                <div class="cover-background padding-30" style="background-image: url('{{URL::to('/')}}/global/photos/placeholder.png')">
                  <blockquote class="cover-quote white">Asperner solvantur fere queo meam videtur temperantiam. Timorem
                    asperner. Hortensio delicatissimi nihilo disserunt, contemnit
                    mi amentur doctrinis logikh triario, appetendi utamur fames.
                  </blockquote>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="timeline-period">Apr 2016</li>
        <li class="timeline-item">
          <div class="timeline-dot bg-green-500">
            <i class="icon wb-file" aria-hidden="true"></i>
          </div>
          <div class="timeline-info">
            <time datetime="2016-04-08">1 Month ago</time>
          </div>
          <div class="timeline-content">
            <div class="widget widget-article widget-shadow">
              <div class="widget-header cover">
                <img class="cover-image" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
              </div>
              <div class="widget-body">
                <h3 class="widget-title">Lorem Ipsum Dolor</h3>
                <p class="widget-metas">
                  <span class="widget-time">MAY 08, 2016</span>
                </p>
                <p>Signiferumque dixit, arbitrium iudicia nominis, potione aeterno
                  genus conducunt deinde incidunt horrent forte voluptate pericula,
                  mortis deleniti, circumcisaque mala sentit iucundius pedalis.
                  Claudicare inanium fugiat contenta dixisset animumque iure quoquo
                  dicturam, defendit militaris sollicitudines, verear, amicorum
                  manum discedere indignae loqui. </p>
                <div class="widget-body-footer">
                  <div class="widget-actions pull-right">
                    <a href="javascript:void(0)">
                      <i class="icon wb-chat-working" aria-hidden="true"></i>
                      <span>2500</span>
                    </a>
                    <a href="javascript:void(0)">
                      <i class="icon wb-heart" aria-hidden="true"></i>
                      <span>20</span>
                    </a>
                  </div>
                  <a class="btn btn-primary btn-outline" href="javascript:void(0)">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="timeline-item timeline-reverse">
          <div class="timeline-dot bg-orange-600">
            <i class="wb-quote-right"></i>
          </div>
          <div class="timeline-info">
            <time datetime="2016-04-08">1 Month ago</time>
          </div>
          <div class="timeline-content">
            <div class="widget widget-article widget-shadow">
              <div class="widget-header cover">
                <div class="cover-background padding-30" style="background-image: url('{{URL::to('/')}}/global/photos/placeholder.png')">
                  <blockquote class="cover-quote white">Ostendis peccandi pertinaces disputandum primus arare morbos
                    noster, privamur alios perpetiuntur nulla est, effecerit corpora
                    doctrina sentiunt hinc quasi, tradere perveniri erigimur.
                  </blockquote>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="timeline-item timeline-reverse">
          <div class="timeline-dot bg-cyan-600">
            <i class="icon wb-video" aria-hidden="true"></i>
          </div>
          <div class="timeline-info">
            <time datetime="2016-04-08">1 Month ago</time>
          </div>
          <div class="timeline-content">
            <div class="widget widget-article widget-shadow">
              <div class="widget-header cover plyr">
                <video poster="{{URL::to('/')}}/assets/examples/images/poster.jpg" controls crossorigin>
                  <!-- Video Files -->
                  <source type="video/mp4" src="https://cdn.selz.com/plyr/1.0/movie.mp4">
                  <source type="video/webm" src="https://cdn.selz.com/plyr/1.0/movie.webm">
                  <!-- Text Track File -->
                  <track kind="captions" label="English" srclang="en" src="//cdn.selz.com/plyr/1.0/en.vtt"
                  default>
                    <!-- Fallback For Browsers That Don'T Support The <Video> Element -->
                    <a href="https://cdn.selz.com/plyr/1.0/movie.mp4">Download</a>
                </video>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <!-- End Timeline -->
    </div>
<br/>

@stop
