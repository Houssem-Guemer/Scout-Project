@extends('layouts.template')
@section('content')
  <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/nestable/nestable.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/html5sortable/sortable.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/tasklist/tasklist.css">
  <div class="page-header">
  <h1 class="page-title font_kufi">Sortable &amp; Nestable </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">Sortable &amp; Nestable</li>
	</ol>
  </div>
</div> 
 <div class="page-content">
      <!-- Panle Sortable -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Sortable
            <small><a class="example-plugin-link" href="https://github.com/voidberg/html5sortable"
              target="_blank">official website</a></small>
          </h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-md-6">
              <!-- Example Sortable -->
              <div class="example-wrap margin-lg-0">
                <h4 class="example-title">Sortable</h4>
                <p>Use when you want to be able inside some badges into each item
                  list, and they can also be sortable by dragging items. </p>
                <ul class="list-group sortable list-group-full" data-plugin="sortable">
                  <li class="list-group-item">
                    <span class="badge badge-success">6</span>
                    <i class="icon wb-inbox" aria-hidden="true"></i> Cras justo
                    odio
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-info">2</span>
                    <i class="icon wb-user" aria-hidden="true"></i> Dapibus ac
                    facilisis in
                  </li>
                  <li class="list-group-item">
                    <i class="icon wb-bell" aria-hidden="true"></i> Morbi leo risus
                  </li>
                  <li class="list-group-item">
                    <span class="badge badge-info">10</span>
                    <i class="icon wb-info-circle" aria-hidden="true"></i> Porta
                    ac consectetur ac
                  </li>
                  <li class="list-group-item">
                    <i class="icon wb-calendar" aria-hidden="true"></i> Vestibulum
                    at eros
                  </li>
                </ul>
              </div>
              <!-- End Example Sortable -->
            </div>
            <div class="col-md-6">
              <!-- Example Handle -->
              <div class="example-wrap">
                <h4 class="example-title">Sortable In Handle</h4>
                <p>Use when you want to be able to sort these order in the items list
                  below. </p>
                <ul class="list-group list-group-gap sortable-with-handle list-group-full" data-plugin="sortable"
                data-handle="i">
                  <li class="list-group-item">
                    <i class="icon wb-list sortable-handle" aria-hidden="true"></i>                    Cras justo odio
                  </li>
                  <li class="list-group-item">
                    <i class="icon wb-list sortable-handle" aria-hidden="true"></i>                    Dapibus ac facilisis in
                  </li>
                  <li class="list-group-item">
                    <i class="icon wb-list sortable-handle" aria-hidden="true"></i>                    Morbi leo risus
                  </li>
                  <li class="list-group-item">
                    <i class="icon wb-list sortable-handle" aria-hidden="true"></i>                    Porta ac consectetur ac
                  </li>
                  <li class="list-group-item">
                    <i class="icon wb-list sortable-handle" aria-hidden="true"></i>                    Vestibulum at eros
                  </li>
                  <li class="list-group-item">
                    <i class="icon wb-list sortable-handle" aria-hidden="true"></i>                    Morbi leo risus
                  </li>
                </ul>
              </div>
              <!-- End Example Handle -->
            </div>
            <div class="clearfix visible-md-block"></div>
            <div class="col-md-6">
              <!-- Example Task -->
              <div class="example-wrap margin-md-0">
                <h4 class="example-title">Sortable With Task List</h4>
                <p>Each items has a checkbox when you want to choice it. You can also
                  drag it to sort their order. </p>
                <ul class="list-task list-group sortable" data-role="tasklist" data-plugin="sortable">
                  <li class="list-group-item task-done" data-role="task">
                    <div class="checkbox-custom checkbox-primary">
                      <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule" checked>
                      <label for="inputSchedule">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                        <span>Schedule meeting</span>
                      </label>
                    </div>
                  </li>
                  <li class="list-group-item" data-role="task">
                    <div class="checkbox-custom checkbox-primary">
                      <input type="checkbox" id="inputCall" name="inputCheckboxesCall">
                      <label for="inputCall">
                        <i class="icon wb-bell" aria-hidden="true"></i>
                        <span>Call clients for follow-up</span>
                        <span class="label label-danger">Today</span>
                      </label>
                    </div>
                  </li>
                  <li class="list-group-item" data-role="task">
                    <div class="checkbox-custom checkbox-primary">
                      <input type="checkbox" id="inputBook" name="inputCheckboxesBook">
                      <label for="inputBook">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                        <span>Book flight for holiday</span>
                      </label>
                    </div>
                  </li>
                  <li class="list-group-item" data-role="task">
                    <div class="checkbox-custom checkbox-primary">
                      <input type="checkbox" id="inputForward" name="inputCheckboxesForward">
                      <label for="inputForward">
                        <span>Forward important tasks</span>
                        <span class="label label-primary">2 weeks</span>
                      </label>
                    </div>
                  </li>
                  <li class="list-group-item" data-role="task">
                    <div class="checkbox-custom checkbox-primary">
                      <input type="checkbox" id="inputRecieve" name="inputCheckboxesRecieve">
                      <label for="inputRecieve">
                        <span>Recieve shipment</span>
                      </label>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- End Example Task -->
            </div>
            <div class="col-md-6">
              <!-- Example Editable -->
              <div class="example-wrap">
                <h4 class="example-title">Sortable With Editable List</h4>
                <p>Each items has some icon to edit the list. You can also drag it
                  to sort their order. </p>
                <ul class="list-group list-group-gap sortable" data-plugin="sortable">
                  <li class="list-group-item list-group-item-warning">
                    <span class="pull-right">
                      <a href="javascript:void(0)">
                        <i class="icon wb-pencil white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-plus white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-close white" aria-hidden="true"></i>
                      </a>
                    </span>
                    <span class="pull-left">
                      <i class="icon wb-sort-vertical" aria-hidden="true"></i>
                    </span> Dapibus ac facilisis in
                  </li>
                  <li class="list-group-item list-group-item-success">
                    <span class="pull-right">
                      <a href="javascript:void(0)">
                        <i class="icon wb-pencil white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-plus white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-close white" aria-hidden="true"></i>
                      </a>
                    </span>
                    <span class="pull-left">
                      <i class="icon wb-sort-vertical" aria-hidden="true"></i>
                    </span> Vestibulum at eros
                  </li>
                  <li class="list-group-item list-group-item-danger">
                    <span class="pull-right">
                      <a href="javascript:void(0)">
                        <i class="icon wb-pencil white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-plus white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-close white" aria-hidden="true"></i>
                      </a>
                    </span>
                    <span class="pull-left">
                      <i class="icon wb-sort-vertical" aria-hidden="true"></i>
                    </span> Vestibulum at eros
                  </li>
                  <li class="list-group-item list-group-item-info">
                    <span class="pull-right">
                      <a href="javascript:void(0)">
                        <i class="icon wb-pencil white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-plus white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-close white" aria-hidden="true"></i>
                      </a>
                    </span>
                    <span class="pull-left">
                      <i class="icon wb-sort-vertical" aria-hidden="true"></i>
                    </span> Porta ac consectetur ac
                  </li>
                  <li class="list-group-item list-group-item-dark">
                    <span class="pull-right">
                      <a href="javascript:void(0)">
                        <i class="icon wb-pencil white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-plus white" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0)">
                        <i class="icon wb-close white" aria-hidden="true"></i>
                      </a>
                    </span>
                    <span class="pull-left">
                      <i class="icon wb-sort-vertical" aria-hidden="true"></i>
                    </span> Cras sit amet nibh libero
                  </li>
                </ul>
              </div>
              <!-- End Example Editable -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Panle Sortable -->
      <!-- Panle Nestables -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Nestable
            <small><a class="example-plugin-link" href="https://github.com/RamonSmit/Nestable"
              target="_blank">official website</a></small>
          </h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-md-6">
              <!-- Example Nestables -->
              <div class="example-wrap">
                <h4 class="example-title">Basic Nestables</h4>
                <p>Users need to access information or functionality but they only
                  need in under certain circumstances. Create items that can be
                  opened or closed independently of each other.</p>
                <div class="example">
                  <div class="dd" data-plugin="nestable">
                    <ol class="dd-list">
                      <li class="dd-item" data-id="1">
                        <div class="dd-handle">ITEM 1
                          <span class="pull-right text-info">Active</span>
                        </div>
                      </li>
                      <li class="dd-item" data-id="2">
                        <div class="dd-handle">ITEM 2
                          <span class="pull-right text-success">Approved</span>
                        </div>
                      </li>
                      <li class="dd-item" data-id="3">
                        <div class="dd-handle">ITEM 3
                          <span class="pull-right text-warning">Pending</span>
                        </div>
                        <ol class="dd-list">
                          <li class="dd-item" data-id="4">
                            <div class="dd-handle">ITEM 4</div>
                          </li>
                          <li class="dd-item" data-id="5" data-foo="bar">
                            <div class="dd-handle">ITEM 5</div>
                          </li>
                        </ol>
                      </li>
                      <li class="dd-item" data-id="6">
                        <div class="dd-handle">ITEM 6</div>
                        <ol class="dd-list">
                          <li class="dd-item" data-id="7">
                            <div class="dd-handle">ITEM 7</div>
                            <ol class="dd-list">
                              <li class="dd-item" data-id="8">
                                <div class="dd-handle">ITEM 8</div>
                              </li>
                            </ol>
                          </li>
                        </ol>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
              <!-- End Example Nestables -->
            </div>
            <div class="col-md-6">
              <!-- Example Handler -->
              <div class="example-wrap">
                <h4 class="example-title">Drag With Handler</h4>
                <p>Nestables and also draggable using touch devices, you can simply
                  create on by with an Ordered list, further reading please reffer
                  documentation.
                </p>
                <div class="example">
                  <div class="dd" data-plugin="nestable">
                    <ol class="dd-list">
                      <li class="dd-item dd-item-alt" data-id="1">
                        <div class="dd-handle"></div>
                        <div class="dd-content">ITEM 1
                          <span class="pull-right wb-wrench"></span>
                        </div>
                      </li>
                      <li class="dd-item dd-item-alt" data-id="2">
                        <div class="dd-handle"></div>
                        <div class="dd-content">ITEM 2
                          <span class="pull-right wb-settings"></span>
                        </div>
                      </li>
                      <li class="dd-item dd-item-alt" data-id="3">
                        <div class="dd-handle"></div>
                        <div class="dd-content">ITEM 3</div>
                        <ol class="dd-list">
                          <li class="dd-item dd-item-alt" data-id="4">
                            <div class="dd-handle"></div>
                            <div class="dd-content">ITEM 4</div>
                          </li>
                          <li class="dd-item dd-item-alt" data-id="5" data-foo="bar">
                            <div class="dd-handle"></div>
                            <div class="dd-content">ITEM 5</div>
                          </li>
                        </ol>
                      </li>
                      <li class="dd-item dd-item-alt" data-id="6">
                        <div class="dd-handle"></div>
                        <div class="dd-content">ITEM 6</div>
                        <ol class="dd-list">
                          <li class="dd-item dd-item-alt" data-id="7">
                            <div class="dd-handle"></div>
                            <div class="dd-content">ITEM 7</div>
                            <ol class="dd-list">
                              <li class="dd-item dd-item-alt" data-id="8">
                                <div class="dd-handle"></div>
                                <div class="dd-content">ITEM 8</div>
                              </li>
                            </ol>
                          </li>
                        </ol>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
              <!-- End Example Handler -->
            </div>
            <div class="clearfix visible-lg-block visible-md-block"></div>
            <div class="col-md-6">
              <!-- Example Sortable -->
              <div class="example-wrap margin-md-0">
                <h4 class="example-title">Connected Sortable List</h4>
                <p>Stack several items on top of each other and give some items a
                  title. The items should be clckable and draggable between the
                  expanded and collapsed states.</p>
                <div class="example">
                  <div class="dd" data-plugin="nestable">
                    <h5>First List</h5>
                    <ol class="dd-list">
                      <li class="dd-item" data-id="1">
                        <div class="dd-handle">ITEM 1</div>
                      </li>
                      <li class="dd-item" data-id="2">
                        <div class="dd-handle">ITEM 2</div>
                      </li>
                      <li class="dd-item" data-id="3">
                        <div class="dd-handle">ITEM 3</div>
                        <ol class="dd-list">
                          <li class="dd-item" data-id="4">
                            <div class="dd-handle">ITEM 4</div>
                          </li>
                          <li class="dd-item" data-id="5" data-foo="bar">
                            <div class="dd-handle">ITEM 5</div>
                          </li>
                        </ol>
                      </li>
                    </ol>
                    <h5>Second List</h5>
                    <ol class="dd-list">
                      <li class="dd-item" data-id="6">
                        <div class="dd-handle">ITEM 6</div>
                      </li>
                      <li class="dd-item" data-id="7">
                        <div class="dd-handle">ITEM 7</div>
                      </li>
                      <li class="dd-item" data-id="8">
                        <div class="dd-handle">ITEM 8</div>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
              <!-- End Example Sortable -->
            </div>
            <div class="col-md-6">
              <!-- Example Nestables With Media Content -->
              <div class="example-wrap">
                <h4 class="example-title">With Media Content</h4>
                <div class="example">
                  <div class="dd" data-plugin="nestable">
                    <ol class="dd-list">
                      <li class="dd-item" data-id="1">
                        <div class="dd-handle">ITEM 1</div>
                        <div class="dd-content">
                          <div class="media">
                            <div class="media-left">
                              <a class="avatar avatar-online" href="javascript:void(0)">
                                <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/1.jpg" alt="..."><i></i></a>
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">Herman Beck</h4>
                              <small>CEO</small>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="dd-item" data-id="2">
                        <div class="dd-handle">ITEM 2</div>
                        <div class="dd-content">
                          <div class="media">
                            <div class="media-left">
                              <a class="avatar avatar-busy" href="javascript:void(0)">
                                <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/2.jpg" alt="..."><i></i></a>
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">Mary Adams</h4>
                              <small>CIO</small>
                            </div>
                          </div>
                        </div>
                        <ol class="dd-list">
                          <li class="dd-item" data-id="3">
                            <div class="dd-handle">ITEM 3</div>
                            <div class="dd-content">
                              <div class="media">
                                <div class="media-left">
                                  <a class="avatar avatar-away" href="javascript:void(0)">
                                    <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/3.jpg" alt="..."><i></i></a>
                                </div>
                                <div class="media-body">
                                  <h4 class="media-heading">Caleb Richards</h4>
                                  <small>CTO</small>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ol>
                      </li>
                      <li class="dd-item" data-id="4">
                        <div class="dd-handle">ITEM 4</div>
                        <div class="dd-content">
                          <div class="media">
                            <div class="media-left">
                              <a class="avatar avatar-online" href="javascript:void(0)">
                                <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/4.jpg" alt="..."><i></i></a>
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">June Lane</h4>
                              <small>CVO</small>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
              <!-- End Example Nestables With Media Content -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Panle Nestables -->
    </div>
<br/>

@stop