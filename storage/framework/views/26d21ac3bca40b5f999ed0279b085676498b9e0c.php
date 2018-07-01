<script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h1 class="page-title font_kufi">Write post</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
                <li class="active">Write Post</li>
            </ol>
        </div>
    </div>
    <div class="page-content" ng-app="app" ng-cloak>
        <div class="panel">
            <div class="panel-body container-fluid">
                <!------------------------start insert, update, delete message  ---------------->
                <div class="row">
                    <?php if(session('msg_success')): ?>
                        <div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            <?php echo e(session('msg_success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('msg_update')): ?>
                        <div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            <?php echo e(session('msg_update')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('msg_delete')): ?>
                        <div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            <?php echo e(session('msg_delete')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <form  name="postForm" action="<?php echo e(URL::to('storePost')); ?>" ng-submit="submitForm(postForm.$valid)" novalidate  id="demo-form2" data-parsley-validate="" method="post" novalidate="">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700">Post Details</p>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicLastName">post title<span class="spancolor">*</span> </label>
                                    <input type="text" class="form-control" id="post_title" name="post_title" ng-model="post_title" ng-init="post_title='<?php echo e(old('post_title')); ?>'" placeholder="post title" required>
                                </div>
                            </div>
                                <textarea name="content" id="editor">
                                    <p>Here goes the initial content of the editor.</p>
                                </textarea>
                            <div class="row">



                        <div style="clear:both"></div>
                            <button type="submit" ng-disabled="postForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                <i class="fa fa-save"></i>  make post
                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                            </button>

                        </div>
                    </div>
                </form>
                <div class="form-group col-sm-6 margin-10">
                    <div class="form-group">
                        <div class="input-group input-group-file">
                            <input type="text"  class="form-control" name="image_name" readonly="true" placeholder="choose an image" ng-model="image_name" ng-init="image_name='<?php echo e(old('image_name')); ?>'">
                            <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="titleImage" multiple="false" onchange="post('/dashboard/posts/upload/', {image: document.getElementById('titleImage').value});" id="titleImage" ng-model="titleImage">
                                        </span>
                                    </span>
                        </div>
                    </div>
            </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div><br/>

    <script>
        var app = angular.module('app', []);

        app.directive("matchPassword", function () {
            return {
                require: "ngModel",
                scope: {
                    otherModelValue: "=matchPassword"
                },
                link: function(scope, element, attributes, ngModel) {

                    ngModel.$validators.matchPassword = function(modelValue) {
                        return modelValue == scope.otherModelValue;
                    };

                    scope.$watch("otherModelValue", function() {
                        ngModel.$validate();
                    });
                }
            };
        });
    </script>
    <script>
        function post(path, parameters) {
            var form = $('<form></form>');
            form.attr("method", "post");
            form.attr("action", path);

            $.each(parameters, function(key, value) {
                var field = $('<input></input>');

                field.attr("type", "hidden");
                field.attr("name", key);
                field.attr("value", value);
                form.append(field);
            });

            // The form needs to be a part of the document in
            // order for us to be able to submit it.
            $(document.body).append(form);
            form.submit();
        }
    </script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>