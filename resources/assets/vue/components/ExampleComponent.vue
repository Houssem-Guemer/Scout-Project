<template>
	<div class="card">
    <form name="scout" action="/dashboard/dash" novalidate id="scout-form" method="POST" >
        <div class="row row-lg">
	        <div class="col-sm-8" style="border-right: 1px dotted #ddd;">
	            <!-- Example Basic Form -->	              
			<div class="row">
			<div class="col-sm-12">
			<p class="font-size-20 blue-grey-700">البيانات</p>
			</div>
			  <div class="form-group col-sm-6">
				<label class="control-label" for="first_name">الاسم<span class="spancolor">*</span> </label>
				<input type="text" class="form-control" id="first_name" name="first_name" placeholder="الاسم" required>
			  </div>
			  <div class="form-group col-sm-6">
				<label class="control-label" for="ilast_name">اللقب<span class="spancolor">*</span> </label>
				<input type="text" class="form-control" id="last_name" name="last_name" placeholder="اللقب" required>
			  </div>
			</div>
			
			<div class="row">			  
			  <div class="form-group col-sm-6">
				<label class="control-label" for="phone">الهاتف</label>
				<input type="text" class="form-control" id="phone" name="phone" placeholder="0X XX XX XX XX" autocomplete="off">
			  </div>			  
			</div>
			<div class="row">			  
			  <div class="form-group col-sm-6">			  
			  <label class="control-label" for="date_of_birth">تاريخ الميلاد</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control" name="date_of_birth" placeholder="تاريخ الميلاد" data-plugin="datepicker">
                  </div>
                </div>			  			  
			</div>
	  
	</div>

	<div class="col-sm-4">
	  <!-- Example Basic Form Without Label -->
	      <div class="col-sm-12 row">
			<p class="font-size-20 blue-grey-700">Login Details</p>
			</div>          
		<div class="form-group">
		  <label class="control-label" for="inputBasicEmail">البريد الالكتروني <span class="spancolor">*</span></label>
		  <input type="email" class="form-control" id="email" name="email" placeholder="البريد" autocomplete="off"/>
		</div>
			
	</div>
	<div style="clear:both"></div>
	<div class="form-group col-sm-6">
	<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
			<i class="fa fa-save"></i>  انشاء
		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>
	
	</div>
  </div>
</form> 
</div>
</template>

<script>
    export default {
        props: ['roleList'],

        mounted() {
            console.log('Component mounted.')
        },
    }
</script>