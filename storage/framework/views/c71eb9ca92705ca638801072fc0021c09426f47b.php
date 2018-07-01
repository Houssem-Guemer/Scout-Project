<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/examples/css/forms/layouts.css">
  <div class="page-header">
  <h1 class="page-title font_kufi">Layouts </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
		<li class="active">Layouts</li>
	</ol>
  </div>
</div> 
 <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Basic Form</h4>
                <div class="example">
                  <form autocomplete="off">
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label class="control-label" for="inputBasicFirstName">First Name</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="inputFirstName"
                        placeholder="First Name" autocomplete="off" />
                      </div>
                      <div class="form-group col-sm-6">
                        <label class="control-label" for="inputBasicLastName">Last Name</label>
                        <input type="text" class="form-control" id="inputBasicLastName" name="inputLastName"
                        placeholder="Last Name" autocomplete="off" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Gender</label>
                      <div>
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" id="inputBasicMale" name="inputGender" />
                          <label for="inputBasicMale">Male</label>
                        </div>
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" id="inputBasicFemale" name="inputGender" checked />
                          <label for="inputBasicFemale">Female</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email Address</label>
                      <input type="email" class="form-control" id="inputBasicEmail" name="inputEmail"
                      placeholder="Email Address" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Password</label>
                      <input type="password" class="form-control" id="inputBasicPassword" name="inputPassword"
                      placeholder="Password" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <div class="checkbox-custom checkbox-default">
                        <input type="checkbox" id="inputBasicRemember" name="inputCheckbox" checked autocomplete="off"
                        />
                        <label for="inputBasicRemember">Remember Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-primary">Sign Up</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Example Basic Form -->
            </div>
            <div class="col-sm-6">
              <!-- Example Basic Form Without Label -->
              <div class="example-wrap">
                <h4 class="example-title">Basic Form Without Label</h4>
                <div class="example">
                  <form class="">
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name"
                        autocomplete="off" />
                      </div>
                      <div class="form-group col-sm-6">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name"
                        autocomplete="off" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="radio-custom radio-default radio-inline">
                        <input type="radio" id="inputLabelMale" name="inputRadioGender" />
                        <label for="inputLabelMale">Male</label>
                      </div>
                      <div class="radio-custom radio-default radio-inline">
                        <input type="radio" id="inputLabelFemale" name="inputRadioGender" checked />
                        <label for="inputLabelFemale">Female</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Email Address"
                      autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="Password"
                      autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" placeholder="Briefly Describe Yourself"></textarea>
                    </div>
                    <div class="form-group">
                      <div class="checkbox-custom checkbox-default">
                        <input type="checkbox" id="inputCheckboxAgree" name="inputCheckboxesAgree" checked
                        autocomplete="off" />
                        <label for="inputCheckboxAgree">Agree Policy</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Example Basic Form Without Label -->
            </div>
            <div class="clearfix hidden-xs"></div>
            <div class="col-sm-12 col-md-6">
              <!-- Example Horizontal Form -->
              <div class="example-wrap">
                <h4 class="example-title">Horizontal Form</h4>
                <p>
                  Use <code>.form-horizontal</code> class to set horizontal form.
                </p>
                <div class="example">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Your Name: </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Full Name" autocomplete="off"
                        />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Your Gender: </label>
                      <div class="col-sm-9">
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" id="inputHorizontalMale" name="inputRadiosMale2" />
                          <label for="inputHorizontalMale">Male</label>
                        </div>
                        <div class="radio-custom radio-default radio-inline">
                          <input type="radio" id="inputHorizontalFemale" name="inputRadiosMale2" checked
                          />
                          <label for="inputHorizontalFemale">Female</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Your Email: </label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" placeholder="@email.com"
                        autocomplete="off" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Description: </label>
                      <div class="col-sm-9">
                        <textarea class="form-control" placeholder="Briefly Describe Yourself"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-9 col-sm-offset-3">
                        <button type="button" class="btn btn-primary">Submit </button>
                        <button type="reset" class="btn btn-default btn-outline">Reset</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Example Horizontal Form -->
            </div>
          </div>
        </div>
      </div>
      <!-- Panel Inline Form -->
      <div class="panel">
        <header class="panel-heading">
          <h3 class="panel-title">
            Inline Form
          </h3>
        </header>
        <div class="panel-body">
          <p>
            Use <code>.form-inline</code> class in the form to style with inline
            fields.
          </p>
          <div class="example-wrap">
            <h4 class="example-title">Basic Inline Form</h4>
            <div class="example">
              <form class="form-inline">
                <div class="form-group">
                  <label class="control-label" for="inputInlineUsername">Username</label>
                  <input type="text" class="form-control" id="inputInlineUsername" name="inputUsername"
                  placeholder="Username" autocomplete="off" />
                </div>
                <div class="form-group">
                  <label class="control-label" for="inputInlinePassword">Password</label>
                  <input type="password" class="form-control" id="inputInlinePassword" name="inputPassword"
                  placeholder="Password" autocomplete="off" />
                </div>
                <div class="form-group">
                  <div class="checkbox-custom checkbox-default">
                    <input type="checkbox" id="inputInlineRemember" name="inputCheckboxRemember" checked
                    autocomplete="off" />
                    <label for="inputInlineRemember">Remember me</label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-outline">Login</button>
                </div>
              </form>
            </div>
            <h4 class="example-title">Basic Inline Form Without Label</h4>
            <div class="example">
              <form class="form-inline">
                <div class="form-group">
                  <label class="sr-only" for="inputUnlabelUsername">Username</label>
                  <input type="text" class="form-control" id="inputUnlabelUsername" placeholder="Username"
                  autocomplete="off" />
                </div>
                <div class="form-group">
                  <label class="sr-only" for="inputUnlabelPassword">Password</label>
                  <input type="password" class="form-control" id="inputUnlabelPassword" placeholder="Password"
                  autocomplete="off" />
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-outline">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Inline Form -->
      <!-- Panel Controls Sizing -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Controls Sizing</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Input Sizing -->
              <div class="example-wrap">
                <h4 class="example-title">Input Sizing</h4>
                <div class="example">
                  <input type="text" class="form-control input-lg" placeholder=".input-lg" />
                </div>
                <div class="example">
                  <input type="text" class="form-control" placeholder="Default input" />
                </div>
                <div class="example">
                  <input type="text" class="form-control input-sm" placeholder=".input-sm" />
                </div>
              </div>
              <!-- End Example Input Sizing -->
            </div>
            <div class="col-sm-6">
              <!-- Example Select Sizing -->
              <div class="example-wrap">
                <h4 class="example-title">Select Sizing</h4>
                <div class="example">
                  <select class="form-control input-lg">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
                <div class="example">
                  <select class="form-control">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
                <div class="example">
                  <select class="form-control input-sm">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                  </select>
                </div>
              </div>
              <!-- End Example Select Sizing -->
            </div>
            <div class="col-sm-12">
              <!-- Example Column Sizing -->
              <div class="example-wrap">
                <h4 class="example-title">Column Sizing</h4>
                <div class="example">
                  <div class="row row-lg">
                    <div class="form-group col-sm-2">
                      <input type="text" class="form-control" placeholder=".col-sm-2">
                    </div>
                    <div class="form-group col-sm-4">
                      <input type="text" class="form-control" placeholder=".col-sm-4">
                    </div>
                    <div class="form-group col-sm-6">
                      <input type="text" class="form-control" placeholder=".col-sm-6">
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Example Column Sizing -->
            </div>
            <div class="col-sm-12">
              <!-- Example Horizontal Form Label Sizing -->
              <div class="example-wrap">
                <h4 class="example-title">Horizontal Form Label Sizing</h4>
                <div class="example">
                  <form class="form-horizontal">
                    <div class="form-group form-group-lg">
                      <label class="col-sm-3 control-label" for="inputSizingLarge">Large label</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputSizingLarge" name="inputLarge"
                        placeholder="Large input">
                      </div>
                    </div>
                    <div class="form-group form-group-sm">
                      <label class="col-sm-3 control-label" for="inputSizingSmall">Small label</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputSizingSmall" name="inputLarge"
                        placeholder="Small input">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Example Horizontal Form Label Sizing -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Controls Sizing -->
      <!-- Panel Input Grid -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Input Grid</h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" placeholder=".col-md-12">
            </div>
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" placeholder=".col-md-6">
            </div>
            <div class="col-md-6 form-group">
              <input type="text" class="form-control" placeholder=".col-md-6">
            </div>
            <div class="col-md-4 form-group">
              <input type="text" class="form-control" placeholder=".col-md-4">
            </div>
            <div class="col-md-4 form-group">
              <input type="text" class="form-control" placeholder=".col-md-4">
            </div>
            <div class="col-md-4 form-group">
              <input type="text" class="form-control" placeholder=".col-md-4">
            </div>
            <div class="col-md-3 form-group">
              <input type="text" class="form-control" placeholder=".col-md-3">
            </div>
            <div class="col-md-3 form-group">
              <input type="text" class="form-control" placeholder=".col-md-3">
            </div>
            <div class="col-md-3 form-group">
              <input type="text" class="form-control" placeholder=".col-md-3">
            </div>
            <div class="col-md-3 form-group">
              <input type="text" class="form-control" placeholder=".col-md-3">
            </div>
            <div class="col-md-2 form-group">
              <input type="text" class="form-control" placeholder=".col-md-2">
            </div>
            <div class="col-md-2 form-group">
              <input type="text" class="form-control" placeholder=".col-md-2">
            </div>
            <div class="col-md-2 form-group">
              <input type="text" class="form-control" placeholder=".col-md-2">
            </div>
            <div class="col-md-2 form-group">
              <input type="text" class="form-control" placeholder=".col-md-2">
            </div>
            <div class="col-md-2 form-group">
              <input type="text" class="form-control" placeholder=".col-md-2">
            </div>
            <div class="col-md-2 form-group">
              <input type="text" class="form-control" placeholder=".col-md-2">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
            <div class="col-md-1 form-group">
              <input type="text" class="form-control" placeholder=".col-md-1">
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Input Grid -->
    </div>
<br/>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>