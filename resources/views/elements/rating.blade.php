@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/advanced/rating.css">
 <div class="page-header">
  <h1 class="page-title font_kufi">Rating </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">Rating</li>
	</ol>
  </div>
</div> 
 <div class="page-content">
      <!-- Panel Rating -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Rating</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Default -->
              <div class="example-wrap">
                <h4 class="example-title">Default</h4>
                <p>A rating is designed for user to vote content or other things.</p>
                <div class="example">
                  <div class="rating" data-plugin="rating"></div>
                </div>
              </div>
              <!-- End Example Default -->
            </div>
            <div class="col-sm-6">
              <!-- Example Sizes -->
              <div class="example-wrap">
                <h4 class="example-title">Sizes</h4>
                <p>You can have different sizes with <code>.rating-sm</code>, <code>.rating-lg</code>.</p>
                <div class="example">
                  <div class="margin-bottom-10">
                    <div class="rating rating-sm" data-score="4" data-plugin="rating"></div>
                  </div>
                  <div class="margin-bottom-10">
                    <div class="rating" data-score="4" data-plugin="rating"></div>
                  </div>
                  <div>
                    <div class="rating rating-lg" data-score="4" data-plugin="rating"></div>
                  </div>
                </div>
              </div>
              <!-- End Example Sizes -->
            </div>
            <div class="col-sm-6">
              <!-- Example Score -->
              <div class="example-wrap">
                <h4 class="example-title">Score</h4>
                <p>You can starts with a saved rating.</p>
                <div class="example">
                  <div class="rating" data-score="3" data-plugin="rating"></div>
                </div>
              </div>
              <!-- End Example Score -->
            </div>
            <div class="col-sm-6">
              <!-- Example Number -->
              <div class="example-wrap">
                <h4 class="example-title">Number</h4>
                <p>Changes the number of stars.</p>
                <div class="example">
                  <div class="rating" data-number="10" data-plugin="rating"></div>
                </div>
              </div>
              <!-- End Example Number -->
            </div>
            <div class="col-sm-6">
              <!-- Example Read Only -->
              <div class="example-wrap">
                <h4 class="example-title">Read Only</h4>
                <p>Changes the number of stars.</p>
                <div class="example">
                  <div class="rating" data-score="4" data-number="5" data-read-only="true" data-plugin="rating"></div>
                </div>
              </div>
              <!-- End Example Read Only -->
            </div>
            <div class="col-sm-6">
              <!-- Example Star Half -->
              <div class="example-wrap">
                <h4 class="example-title">Star Half</h4>
                <p>You will be possible vote with half values.</p>
                <div class="example">
                  <div class="rating" data-score="3.5" data-half="true" data-plugin="rating"></div>
                </div>
              </div>
              <!-- End Example Star Half -->
            </div>
            <div class="col-sm-6">
              <!-- Example Custom Icons -->
              <div class="example-wrap">
                <h4 class="example-title">Custom Icons</h4>
                <p>You can use custom icons</p>
                <div class="example">
                  <div class="rating" data-score="4" data-star-off="icon wb-heart-outline" data-star-on="icon wb-heart red-600"
                  data-plugin="rating"></div>
                </div>
              </div>
              <!-- End Example Custom Icons -->
            </div>
            <div class="col-sm-6">
              <!-- Example With Cancel -->
              <div class="example-wrap">
                <h4 class="example-title">With Cancel</h4>
                <p>A rating can use a set of star icons with a cancel icon.</p>
                <div class="example">
                  <div class="rating" data-plugin="rating" data-cancel="true"></div>
                </div>
              </div>
              <!-- End Example With Cancel -->
            </div>
            <div class="col-sm-6">
              <!-- Example With Target -->
              <div class="example-wrap margin-sm-0">
                <h4 class="example-title">With Target</h4>
                <p>You can match a level name for each star icon when user vote content.
                </p>
                <div class="example">
                  <div class="rating" data-plugin="rating" data-cancel="true" data-target="#exampleHintTarget"
                  data-hints="Bad,Poor,Regular,Good,Gorgeous"></div>
                  <div class="rating-hint" id="exampleHintTarget"></div>
                </div>
              </div>
              <!-- End Example With Target -->
            </div>
            <div class="col-sm-6">
              <!-- Example Percentage -->
              <div class="example-wrap">
                <h4 class="example-title">Percentage</h4>
                <p>A rating can use a set of star icons with a visible percentage.</p>
                <div class="example">
                  <div class="rating" data-plugin="rating" data-cancel="true" data-target="#exampleHintPercentage"
                  data-number="10" data-hints="10%,20%,30%,40%,50%,60%,70%,80%,90%,100%"></div>
                  <div class="rating-hint" id="exampleHintPercentage"></div>
                </div>
              </div>
              <!-- End Example Percentage -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Rating -->
    </div>
<br/>

@stop