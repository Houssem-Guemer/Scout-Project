<?php $__env->startSection('content'); ?>
 <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/examples/css/uikit/modals.css">
 <div class="page-header">
  <h1 class="page-title font_lato">Modals </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
		<li class="active">Modals</li>
	</ol>
  </div>
</div> 
 <div class="page-content">
      <!-- Panel Modals Styles -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Modals Styles</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-lg-6 col-md-12">
              <div class="example-wrap">
                <div class="example example-modal">
                  <!-- Modal -->
                  <div class="modal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer nec odio. Praesent libero. Sed cursus ante
                            dapibus diam. Sed nisi. Nulla quis sem at nibh elementum
                            imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce
                            nec tellus sed augue semper porta. Mauris massa. Vestibulum
                            lacinia arcu eget nulla.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-top-5" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary margin-top-5">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <!-- Example Basic Modals (Nifty Modals) -->
              <div class="example-wrap">
                <h4 class="example-title">Basic Modals (Nifty Modals)</h4>
                <p>Modal disables the original page beneath the overlay. The user
                  needs to take an action or cancel the overlay until he can continue
                  interacting with the original page. Modal are easy to implement,
                  but they should be used sparingly. They interrupt the user flow,
                  make it impossible to interact with the page and the overlay
                  at the same time, and hide the content behind the overlay. This
                  can be very annoying to users.</p>
                <div class="example example-buttons">
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftyFadeScale"
                  data-toggle="modal" type="button">Fade in &amp; Scale</button>
                  <!-- Modal -->
                  <div class="modal fade modal-fade-in-scale-up" id="exampleNiftyFadeScale" aria-hidden="true"
                  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftySlideFromRight"
                  data-toggle="modal" type="button">Slide from right</button>
                  <!-- Modal -->
                  <div class="modal fade modal-slide-in-right" id="exampleNiftySlideFromRight" aria-hidden="true"
                  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftySlideFromBottom"
                  data-toggle="modal" type="button">Slide from bottom</button>
                  <!-- Modal -->
                  <div class="modal fade modal-slide-from-bottom" id="exampleNiftySlideFromBottom"
                  aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog"
                  tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftyNewspaper"
                  data-toggle="modal" type="button">Newspaper</button>
                  <!-- Modal -->
                  <div class="modal fade modal-newspaper" id="exampleNiftyNewspaper" aria-hidden="true"
                  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftyFall" data-toggle="modal"
                  type="button">Fall</button>
                  <!-- Modal -->
                  <div class="modal fade modal-fall" id="exampleNiftyFall" aria-hidden="true" aria-labelledby="exampleModalTitle"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftySideFall"
                  data-toggle="modal" type="button">Slide Fall</button>
                  <!-- Modal -->
                  <div class="modal fade modal-side-fall" id="exampleNiftySideFall" aria-hidden="true"
                  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftyFlipHorizontal"
                  data-toggle="modal" type="button">3D Flip horizontal</button>
                  <!-- Modal -->
                  <div class="modal fade modal-3d-flip-horizontal" id="exampleNiftyFlipHorizontal"
                  aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog"
                  tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftyFlipVertical"
                  data-toggle="modal" type="button">3D Flip vertical</button>
                  <!-- Modal -->
                  <div class="modal fade modal-3d-flip-vertical" id="exampleNiftyFlipVertical" aria-hidden="true"
                  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNifty3dSign" data-toggle="modal"
                  type="button">3D Sign</button>
                  <!-- Modal -->
                  <div class="modal fade modal-3d-sign" id="exampleNifty3dSign" aria-hidden="true"
                  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftySuperScaled"
                  data-toggle="modal" type="button">Super Scalled</button>
                  <!-- Modal -->
                  <div class="modal fade modal-super-scaled" id="exampleNiftySuperScaled" aria-hidden="true"
                  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNiftyJustMe" data-toggle="modal"
                  type="button">Just Me</button>
                  <!-- Modal -->
                  <div class="modal fade modal-just-me" id="exampleNiftyJustMe" aria-hidden="true"
                  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNifty3dSlit" data-toggle="modal"
                  type="button">3D Slit</button>
                  <!-- Modal -->
                  <div class="modal fade modal-3d-slit" id="exampleNifty3dSlit" aria-hidden="true"
                  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNifty3dRotateBottom"
                  data-toggle="modal" type="button">3D Rotate Bottom</button>
                  <!-- Modal -->
                  <div class="modal fade modal-rotate-from-bottom" id="exampleNifty3dRotateBottom"
                  aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog"
                  tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <button class="btn btn-outline btn-default" data-target="#exampleNifty3dRotateInLeft"
                  data-toggle="modal" type="button">3D Rotate In Left</button>
                  <!-- Modal -->
                  <div class="modal fade modal-rotate-from-left" id="exampleNifty3dRotateInLeft"
                  aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog"
                  tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
            </div>
          </div>
          <div class="row row-lg">
            <div class="col-lg-12">
              <div class="example-wrap">
                <h4 class="example-title">Position</h4>
                <p>There are four direction for the modal slider in from the page
                  screen. when you click the button of each preivew image below,
                  you will see the relevant modal demo.</p>
                <div class="row row-lg">
                  <div class="col-lg-3 col-sm-6">
                    <!-- Example Top -->
                    <div class="example-wrap">
                      <h4 class="example-title">Top</h4>
                      <div class="example">
                        <div class="example-well height-250 example-modal-top">
                          <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/modal-position.png"
                          alt="...">
                        </div>
                        <button class="btn btn-primary" data-target="#examplePositionTop" data-toggle="modal"
                        type="button">Generate</button>
                        <!-- Modal -->
                        <div class="modal fade" id="examplePositionTop" aria-hidden="true" aria-labelledby="examplePositionTop"
                        role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-top">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalTitle">Modal Title</h4>
                              </div>
                              <div class="modal-body">
                                <p>One fine body�</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->
                      </div>
                    </div>
                    <!-- End Example Top -->
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <!-- Example Center -->
                    <div class="example-wrap">
                      <h4 class="example-title">Center</h4>
                      <div class="example">
                        <div class="example-well height-250">
                          <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/modal-position.png"
                          alt="...">
                        </div>
                        <button class="btn btn-primary" data-target="#examplePositionCenter" data-toggle="modal"
                        type="button">Generate</button>
                        <!-- Modal -->
                        <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
                        role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-center">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Modal Title</h4>
                              </div>
                              <div class="modal-body">
                                <p>One fine body�</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->
                      </div>
                    </div>
                    <!-- End Example Center -->
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <!-- Example Bottom -->
                    <div class="example-wrap">
                      <h4 class="example-title">Bottom</h4>
                      <div class="example">
                        <div class="example-well height-250 example-modal-bottom">
                          <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/modal-position.png"
                          alt="...">
                        </div>
                        <button class="btn btn-primary" data-target="#examplePositionBottom" data-toggle="modal"
                        type="button">Generate</button>
                        <!-- Modal -->
                        <div class="modal fade" id="examplePositionBottom" aria-hidden="true" aria-labelledby="examplePositionBottom"
                        role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-bottom">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Modal Title</h4>
                              </div>
                              <div class="modal-body">
                                <p>One fine body�</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->
                      </div>
                    </div>
                    <!-- End Example Bottom -->
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <!-- Example Sidebar -->
                    <div class="example-wrap">
                      <h4 class="example-title">Sidebar</h4>
                      <div class="example">
                        <div class="example-well height-250 example-modal-sidebar">
                          <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/modal-position-sidebar.png"
                          alt="...">
                        </div>
                        <button class="btn btn-primary" data-target="#examplePositionSidebar" data-toggle="modal"
                        type="button">Generate</button>
                        <!-- Modal -->
                        <div class="modal fade" id="examplePositionSidebar" aria-hidden="true" aria-labelledby="examplePositionSidebar"
                        role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-sidebar modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Modal Title</h4>
                              </div>
                              <div class="modal-body">
                                <p>One fine body� One fine body�</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-block">Save changes</button>
                                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->
                      </div>
                    </div>
                    <!-- End Example Sidebar -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row row-lg">
            <div class="col-lg-4 col-md-6">
              <!-- Example Form Modal -->
              <div class="example-wrap">
                <h4 class="example-title">Form Modal</h4>
                <div class="example">
                  <div class="example-well height-350">
                    <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/form-modal.png" alt="...">
                  </div>
                  <p>This modals including title, input for each field. </p>
                  <button class="btn btn-primary" data-target="#exampleFormModal" data-toggle="modal"
                  type="button">Generate</button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <form class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" id="exampleFormModalLabel">Set The Messages</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-lg-4 form-group">
                              <input type="text" class="form-control" name="firstName" placeholder="First Name">
                            </div>
                            <div class="col-lg-4 form-group">
                              <input type="email" class="form-control" name="lastName" placeholder="Last Name">
                            </div>
                            <div class="col-lg-4 form-group">
                              <input type="email" class="form-control" name="email" placeholder="Your Email">
                            </div>
                            <div class="col-lg-12 form-group">
                              <textarea class="form-control" rows="5" placeholder="Type your message"></textarea>
                            </div>
                            <div class="col-sm-12 pull-right">
                              <button class="btn btn-primary btn-outline" data-dismiss="modal" type="button">Add Comment</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
              <!-- End Example Form Modal -->
            </div>
            <div class="col-lg-4 col-md-6">
              <!-- Example Multiple Modals -->
              <div class="example-wrap">
                <h4 class="example-title">Multiple Modals</h4>
                <div class="example">
                  <div class="example-well height-350">
                    <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/multiple-modal.png"
                    alt="...">
                  </div>
                  <p>There is a new modal displayed overlay the first one by clicking
                    the function button. </p>
                  <button class="btn btn-primary" data-target="#exampleMultipleOne" data-toggle="modal"
                  type="button">Generate</button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleMultipleOne" aria-hidden="true" aria-labelledby="exampleMultipleOne"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal #1</h4>
                        </div>
                        <div class="modal-body">
                          <p>Follow us along to modal 2</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-target="#exampleMultipleTwo"
                          data-toggle="modal" data-dismiss="modal">Proceed</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <!-- Modal -->
                  <div class="modal fade" id="exampleMultipleTwo" aria-hidden="false" role="dialog"
                  tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal #2</h4>
                        </div>
                        <div class="modal-body">
                          <p>To be continue...</p>
                        </div>
                        <div class="modal-footer">
                          <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)"
                          role="button">Close</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
              <!-- End Example Multiple Modals -->
            </div>
            <div class="col-lg-4 col-md-6">
              <!-- Example Optional Sizes -->
              <div class="example-wrap">
                <h4 class="example-title">Optional Sizes</h4>
                <div class="example">
                  <div class="example-well height-350">
                    <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/size-modal.png" alt="...">
                  </div>
                  <p>This modal has multiple size dialog for you to choice. </p>
                  <div class="example-buttons">
                    <button type="button" class="btn btn-primary" data-target=".example-modal-lg" data-toggle="modal">Large Generate</button>
                    <button type="button" class="btn btn-primary" data-target=".example-modal-sm" data-toggle="modal">Small Generate</button>
                  </div>
                  <!-- Modal -->
                  <div class="modal fade example-modal-lg" aria-hidden="true" aria-labelledby="exampleOptionalLarge"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" id="exampleOptionalLarge">Large Modal</h4>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <!-- Modal -->
                  <div class="modal fade example-modal-sm" aria-hidden="true" aria-labelledby="exampleOptionalSmall"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" id="exampleOptionalSmall">Small Modal</h4>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
              <!-- End Example Optional Sizes -->
            </div>
            <div class="clearfix visible-lg-block"></div>
            <div class="col-lg-4 col-md-6">
              <!-- Example Tab In Modal -->
              <div class="example-wrap">
                <h4 class="example-title">Tab In Modal</h4>
                <div class="example">
                  <div class="example-well height-350">
                    <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/tab-modal.png" alt="...">
                  </div>
                  <p>This modal including title, tabs for you display additional content
                    inline in the same modal. </p>
                  <button class="btn btn-primary" data-target="#exampleTabs" data-toggle="modal"
                  type="button">Generate</button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleTabs" aria-hidden="true" aria-labelledby="exampleModalTabs"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" id="exampleModalTabs">Tabs In Modal</h4>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                          <li class="active" role="presentation"><a data-toggle="tab" href="#exampleLine1" aria-controls="exampleLine1"
                            role="tab">Home</a></li>
                          <li role="presentation"><a data-toggle="tab" href="#exampleLine2" aria-controls="exampleLine2"
                            role="tab">Components</a></li>
                          <li role="presentation"><a data-toggle="tab" href="#exampleLine3" aria-controls="exampleLine3"
                            role="tab">CSS</a></li>
                          <li role="presentation"><a data-toggle="tab" href="#exampleLine4" aria-controls="exampleLine4"
                            role="tab">JavaScript</a></li>
                        </ul>
                        <div class="modal-body">
                          <div class="tab-content">
                            <div class="tab-pane active" id="exampleLine1" role="tabpanel">
                              Insolens patientiamque recte caecilii gaudere alienae varias repetitis inscientia
                              ipsos. Partiendo interpretum vult ludicra iam abest
                              disputatum geometriaque inflammat probes, tandem
                              ullum iuste texit mundus delicatissimi iactare, impeditur
                              panaetium intellegentium afferat talem satisfacit
                              numquid accedunt secumque perspiciatis, invenire
                              inquam voluptaria virtute concederetur genus suavitate,
                              inviti argumentum parentes, repudiandae aliud perspiciatis,
                              latinas consul pluribus regula ceramico turbent,
                              cogitavisse possunt suo tranquillitate.
                            </div>
                            <div class="tab-pane" id="exampleLine2" role="tabpanel">
                              Tenuit omni magistra quale honoris, maluisti invidi, successerit feramus fere omnium
                              impetum locus suscipiantur ullum, gessisse afranius
                              stabilique repellendus longinquitate sentiamus torquatos
                              rem. Bene continens, depulsa soluta domesticarum
                              inscientia excruciant artes epicuri, huic similique
                              constringendos probo animadversionis claris sententia
                              atqui vocent constituit, epicuri hosti iniuste naturales
                              multos, optimus animadvertat stoicis nullae, fieri
                              futura tempore philosophia expleantur putarent doloris
                              delectus viris.
                            </div>
                            <div class="tab-pane" id="exampleLine3" role="tabpanel">
                              Cernimus nutu. Maioribus solet. Iustitiam conciliant reliquisti instituendarum
                              solido quicquid, superstitione placet illis privatione
                              clariora audeam repellat morbos accusantibus, quaeso
                              copulationes. Percurri salutatus derigatur praeter
                              involuta canes afflueret iam amotio quin. Dicent
                              dialectica evertunt astris venire senserit. Vulgo
                              supplicii amputata ipsarum ennius insolens meminerunt
                              quisquam, volumus occulte l videor contenta numen,
                              patrioque. Dixerit cernimus consequentium definitiones
                              interrogari, maximo, avocent opes.
                            </div>
                            <div class="tab-pane" id="exampleLine4" role="tabpanel">
                              Nec iste vellem, accusamus inesse exhorrescere tertium dominationis licebit perpetiuntur,
                              adduci concederetur memoriter omnesque aliquem etsi
                              salutatus administrari aliquid graviter, mandamus
                              celeritas patet fortibus. Dolorum tantis nostram
                              fortitudo probarentur utrumvis insipientiam, putent,
                              esset p fortitudo repetitis concursionibus interiret
                              clariora. Fabulae aperiri. Omnes aspernari placuit
                              detraxit familias aeternum eum mediocritatem, videantur
                              partis nondum indoctis, emancipaverat probatum intus
                              iactant petulantes, levitatibus copiosae.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
              <!-- End Example Tab In Modal -->
            </div>
            <div class="clearfix visible-md-block"></div>
            <div class="col-lg-4 col-md-6">
              <!-- Example Accordions In Modal -->
              <div class="example-wrap">
                <h4 class="example-title">Accordions In Modal</h4>
                <div class="example">
                  <div class="example-well height-350">
                    <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/accordion-modal.png"
                    alt="...">
                  </div>
                  <p>This modal with accordions to have additional content hidden
                    until the user needs them. </p>
                  <button class="btn btn-primary" data-target="#exampleAccrodionModal" data-toggle="modal"
                  type="button">Generate</button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleAccrodionModal" aria-hidden="true" aria-labelledby="exampleAccrodionModal"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="panel-group panel-group-continuous margin-0" id="exampleAccrodion1"
                        aria-multiselectable="true" role="tablist">
                          <div class="panel">
                            <div class="panel-heading" id="exampleHeadingFirst" role="tab">
                              <a class="panel-title" data-parent="#exampleAccrodion1" data-toggle="collapse"
                              href="#exampleCollapseFirst" aria-controls="exampleCollapseFirst"
                              aria-expanded="false">
                                <i class="md-palette"></i> First
                              </a>
                            </div>
                            <div class="panel-collapse collapse in" id="exampleCollapseFirst" aria-labelledby="exampleHeadingFirst"
                            role="tabpanel">
                              <div class="panel-body">
                                Remissius verear, sabinum concessum linguam umbram saepe vendibiliora quoddam terroribus,
                                intellegere rectas videmus octavio sapientiam,
                                mox magistra provincias chaere videre coerceri
                                efficiat, corpus mediocriterne sinat beatam denique
                                maiora menandro, iniucundus fastidium, aliquem
                                probatus benivolentiam omnium summum facultas fuga,
                                debitis mirari menandri domus molita. Maximisque
                                interpretaris multoque exercitus tractatas, commemorandis
                                pecunias.
                              </div>
                            </div>
                          </div>
                          <div class="panel">
                            <div class="panel-heading" id="exampleHeadingSecond" role="tab">
                              <a class="panel-title collapsed" data-parent="#exampleAccrodion1" data-toggle="collapse"
                              href="#exampleCollapseSecond" aria-controls="exampleCollapseSecond"
                              aria-expanded="false">
                                <i class="md-place"></i> Second
                              </a>
                            </div>
                            <div class="panel-collapse collapse" id="exampleCollapseSecond" aria-labelledby="exampleHeadingSecond"
                            role="tabpanel">
                              <div class="panel-body">
                                Diuturnitatem chremes gratia macedonum referatur intellegitur t ea industriae plus,
                                ex videmus praetereat ratio mediocrem pro orestem,
                                ipsam lictores perpetiuntur aperiri benivolentiam,
                                nusquam ignaviamque athenis m plato videamus, liberatione
                                scientia nihilo aristotelem quoquo consumere latinam,
                                successerit certa morte menandro delectatum noster
                                impetu videri senserit, infinitum iudicatum misisti
                                conectitur, voce proficiscuntur.
                              </div>
                            </div>
                          </div>
                          <div class="panel">
                            <div class="panel-heading" id="exampleHeadingThird" role="tab">
                              <a class="panel-title collapsed" data-parent="#exampleAccrodion1" data-toggle="collapse"
                              href="#exampleCollapseThird" aria-controls="exampleCollapseThird"
                              aria-expanded="false">
                                <i class="md-loupe"></i> Third
                              </a>
                            </div>
                            <div class="panel-collapse collapse" id="exampleCollapseThird" aria-labelledby="exampleHeadingThird"
                            role="tabpanel">
                              <div class="panel-body">
                                Audire scribimus spe platonis longinquitate evertunt scribi, notionem doleamus
                                assentiar mortis lucilius, exedunt. Finitum genus
                                coniunctione vidisse, ipsam grate studuisse respondendum
                                ignorant probabo atomum. Corrumpit mortem instructus
                                totam familiarem tertium voluntates consilia aperiam
                                disputata, plena animumque ius supplicii incurrunt
                                laboribus, rationis dedocendi incurreret illam
                                triari utrisque eos commodius. Assentiar magnitudinem.
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
              <!-- End Example Accordions In Modal -->
            </div>
            <div class="col-lg-4 col-md-6">
              <!-- Example Grid In Modal -->
              <div class="example-wrap">
                <h4 class="example-title">Grid In Modal</h4>
                <div class="example">
                  <div class="example-well height-350">
                    <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/grid-modal.png" alt="...">
                  </div>
                  <p>This modal including title and grids to layout through a series
                    of two columns that house your content. </p>
                  <button class="btn btn-primary" data-target="#exampleGrid" data-toggle="modal"
                  type="button">Generate</button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleGrid" aria-hidden="true" aria-labelledby="exampleGrid"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Grid In Modal</h4>
                        </div>
                        <div class="modal-body">
                          <div class="example-grid">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                              <div class="col-md-6">
                                <div class="example-col">.col-md-6</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
              <!-- End Example Grid In Modal -->
            </div>
            <div class="col-lg-4 col-md-6">
              <!-- Example Styles -->
              <div class="example-wrap margin-md-0">
                <h4 class="example-title">Styles</h4>
                <div class="example">
                  <div class="example-well height-350">
                    <img class="center" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/style-modal.png" alt="...">
                  </div>
                  <p>We provide six color options for modal title background color.
                  </p>
                  <div class="color-selector-wrap clearfix">
                    <p class="pull-left padding-top-5 margin-right-20">Choose color generate:</p>
                    <ul class="color-selector">
                      <li class="bg-primary-600">
                        <input type="radio" id="inputStylePrimary" name="colorChosen" data-target="#exampleModalPrimary"
                        data-toggle="modal" />
                        <label for="inputStylePrimary"></label>
                      </li>
                      <li class="bg-green-600">
                        <input type="radio" id="inputStyleSuccess" name="colorChosen" data-target="#exampleModalSuccess"
                        data-toggle="modal" />
                        <label for="inputStyleSuccess"></label>
                      </li>
                      <li class="bg-red-600">
                        <input type="radio" id="inputStyleDanger" name="colorChosen" data-target="#exampleModalDanger"
                        data-toggle="modal" />
                        <label for="inputStyleDanger"></label>
                      </li>
                      <li class="bg-orange-600">
                        <input type="radio" id="inputStyleWarning" name="colorChosen" data-target="#exampleModalWarning"
                        data-toggle="modal" />
                        <label for="inputStyleWarning"></label>
                      </li>
                      <li class="bg-cyan-600">
                        <input type="radio" id="inputStyleInfo" name="colorChosen" data-target="#exampleModalInfo"
                        data-toggle="modal" />
                        <label for="inputStyleInfo"></label>
                      </li>
                    </ul>
                  </div>
                  <!-- Modal -->
                  <div class="modal fade modal-primary" id="exampleModalPrimary" aria-hidden="true"
                  aria-labelledby="exampleModalPrimary" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <!-- Modal -->
                  <div class="modal fade modal-success" id="exampleModalSuccess" aria-hidden="true"
                  aria-labelledby="exampleModalSuccess" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <!-- Modal -->
                  <div class="modal fade modal-danger" id="exampleModalDanger" aria-hidden="true"
                  aria-labelledby="exampleModalDanger" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <!-- Modal -->
                  <div class="modal fade modal-warning" id="exampleModalWarning" aria-hidden="true"
                  aria-labelledby="exampleModalWarning" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <!-- Modal -->
                  <div class="modal fade modal-info" id="exampleModalInfo" aria-hidden="true" aria-labelledby="exampleModalInfo"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Modal Title</h4>
                        </div>
                        <div class="modal-body">
                          <p>One fine body�</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
              <!-- End Example Styles -->
            </div>
            <div class="col-lg-4 col-md-6">
              <!-- Example Fill In -->
              <div class="example-wrap">
                <h4 class="example-title">Fill In</h4>
                <div class="example">
                  <div class="example-well height-350" style="background-color: #fff">
                    <img class="center width-full height-full" src="<?php echo e(URL::to('/')); ?>/assets/examples/images/modal/fillin-modal.png"
                    alt="...">
                  </div>
                  <p>This modal zooms from the middle and fills in fill-in to the
                    modal.
                  </p>
                  <button class="btn btn-primary" data-target="#exampleFillIn" data-toggle="modal"
                  type="button">Generate</button>
                  <!-- Modal -->
                  <div class="modal fade modal-fill-in" id="exampleFillIn" aria-hidden="false" aria-labelledby="exampleFillIn"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title" id="exampleFillInModalTitle">Set The Messages</h4>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="row">
                              <div class="col-lg-4 form-group">
                                <input type="text" class="form-control" name="firstName" placeholder="First Name">
                              </div>
                              <div class="col-lg-4 form-group">
                                <input type="email" class="form-control" name="lastName" placeholder="Last Name">
                              </div>
                              <div class="col-lg-4 form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your Email">
                              </div>
                              <div class="col-lg-12">
                                <textarea class="form-control" rows="5" placeholder="Type your message"></textarea>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                </div>
              </div>
              <!-- End Example Fill In -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Modals Styles -->
    </div>
<br/>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>