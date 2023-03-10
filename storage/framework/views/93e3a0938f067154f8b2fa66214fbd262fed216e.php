

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        <img src="assets/images/users/user-8.jpg" alt="" height="110" class="rounded-circle">
                                        <span class="met-profile_main-pic-change">
                                            <i class="fas fa-camera"></i>
                                        </span>
                                    </div>
                                    <div class="met-profile_user-detail">
                                        <h5 class="met-user-name"><?php echo e(Auth::user()->name); ?></h5>                                                        
                                        <p class="mb-0 met-user-name-post">Adminstrator</p>                                                        
                                    </div>
                                </div>                                                
                            </div><!--end col-->
                            
                            <div class="col-lg-4 ms-auto align-self-center">
                                <ul class="list-unstyled personal-detail mb-0">
                                    <li class=""><i class="las la-phone mr-2 text-secondary font-22 align-middle"></i> <b> Telefon </b> : +998 99 1234567</li>
                                    <li class="mt-2"><i class="las la-envelope text-secondary font-22 align-middle mr-2"></i> <b> Email </b> : <?php echo e(Auth::user()->email); ?></li>
                                    <li class="mt-2"><i class="las la-globe text-secondary font-22 align-middle mr-2"></i> <b> Sayt </b> : 
                                        <a href="https://mannatthemes.com/" class="font-14 text-primary">https://biznesavtomat.uz/</a> 
                                    </li>                                                   
                                </ul>
                               
                            </div><!--end col-->
                            <div class="col-lg-4 align-self-center">
                                <div class="row">
                                    <div class="col-auto text-end border-end">
                                        <button type="button" class="btn btn-soft-primary btn-icon-circle btn-icon-circle-sm mb-2">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>
                                        <p class="mb-0 fw-semibold">Facebook</p>
                                        <h4 class="m-0 fw-bold">25k <span class="text-muted font-12 fw-normal">Followers</span></h4>
                                    </div><!--end col-->
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-soft-info btn-icon-circle btn-icon-circle-sm mb-2">
                                            <i class="fab fa-twitter"></i>
                                        </button>
                                        <p class="mb-0 fw-semibold">Twitter</p>
                                        <h4 class="m-0 fw-bold">58k <span class="text-muted font-12 fw-normal">Followers</span></h4>
                                    </div><!--end col-->
                                </div><!--end row-->                                               
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end f_profile-->                                                                                
                </div><!--end card-body-->  
                <div class="card-body p-0">    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                                                                       
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#Settings" role="tab" aria-selected="false">Sozlamalar</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                                                                       
                        <div class="tab-pane p-3 active" id="Settings" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">                      
                                                    <h4 class="card-title">Foydalanuvchi haqida</h4>                      
                                                </div><!--end col-->                                                       
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <div class="card-body">
                                        	    
                                        	<div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Ism Familiya</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <h4 class="card-title"><?php echo e(Auth::user()->name); ?></h4>
                                                </div>
                                            </div>                          
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Ism</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="text" name="ism" value="">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Familiya</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="text" name="fish" value="">
                                                </div>
                                            </div>
                                            
                
                                            
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="las la-at"></i></span>
                                                        <input type="text" class="form-control" name="email" value="<?php echo e(Auth::user()->email); ?>" placeholder="Email" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group mb-3 row">
                                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                    <button type="submit" id="update_profile" class="btn btn-de-primary">Saqlash</button>
                                                </div>
                                            </div>                                                    
                                        </div>                                            
                                    </div>
                                </div> <!--end col--> 
                                <div class="col-lg-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Parolni yangilash</h4>
                                        </div><!--end card-header-->
                                        <div class="card-body"> 
                                            
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Yangi parol</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" name="password" type="password" placeholder="Yangi parol">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Tasdiqlash</label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="password" name="password2" placeholder="Parolni qayta kiritish">
                                                    <small style="color:red" class="error"></small>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                    <button type="submit" id="update_password" class="btn btn-de-primary">Parolni yangilash</button>
                                                </div>
                                            </div>   
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                    
                                </div> <!-- end col -->                                                                              
                            </div><!--end row-->
                        </div>
                    </div>        
                </div> <!--end card-body-->                            
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->

</div><!-- container -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $("#update_profile").click(function(e){
  
        e.preventDefault();
   
        var ism = $("input[name=ism]").val();
        var fish = $("input[name=fish]").val();
        var email = $("input[name=email]").val();
   
        $.ajax({
           type:'POST',
           url:"<?php echo e(route('profile.update', ['id'=>Auth::user()->id])); ?>",
           data:{name:ism+' '+fish, email:email, type: 'user'},
           success:function(data){
              location.reload();
           }
        });
  
    });

    $("#update_password").click(function(e){
  
        e.preventDefault();
   
        var password = $("input[name=password]").val();
        var password2 = $("input[name=password2]").val();
        
        if(password !== password2){
        	$('.error').text('Parol qayta kiritilmadi!');
        	return false;
        }else{
        	$('.error').text('');
        } 

        $.ajax({
           type:'POST',
           url:"<?php echo e(route('profile.update', ['id'=>Auth::user()->id])); ?>",
           data:{password:password, type: 'password'},
           success:function(data){
           	
              	$.ajax({type: 'POST',url: '/logout',success: function(){
                        location.reload();
                    }
                });
           }
        });   
  
    });
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/biznesavtomat/data/www/biznesavtomat.uz/project/resources/views/admin/profile.blade.php ENDPATH**/ ?>