<?php $__env->startSection('content'); ?>
<div class="container-fluid">
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Bosh sahifa</a>
                </ol>
            </div>
            <h4 class="page-title">Statistika</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<!-- end page title end breadcrumb -->

<div class="row">
    
    <div class="col-lg-12">
        <div class="row justify-content-center"> 
            <div class="col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="col-3">
                                <i class="ti ti-users font-36 align-self-center text-dark"></i>
                            </div><!--end col-->
                            <div class="col-12 ms-auto align-self-center">
                                <div id="dash_spark_1" class="mb-3"></div>
                            </div><!--end col-->
                            <div class="col-12 ms-auto align-self-center">
                                <h3 class="text-dark my-0 font-22 fw-bold"><?php echo e($client); ?></h3>
                                <p class="text-muted mb-0 fw-semibold">Klientlat</p>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body--> 
                </div><!--end card-->                                     
            </div> <!--end col--> 
            <div class="col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="col-3">
                                <i class="ti ti-browser font-36 align-self-center text-dark"></i>
                            </div><!--end col-->
                            <div class="col-auto ms-auto align-self-center">
                                <span class="badge badge-soft-success px-2 py-1 font-11">Active</span>
                            </div><!--end col-->
                            <div class="col-12 ms-auto align-self-center">
                                <div id="dash_spark_2" class="mb-3"></div>
                            </div><!--end col-->
                            <div class="col-12 ms-auto align-self-center">
                                <h3 class="text-dark my-0 font-22 fw-bold"><?php echo e($provider); ?></h3>
                                <p class="text-muted mb-0 fw-semibold">To'lov tizimlari</p>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body--> 
                </div><!--end card-->                                     
            </div> <!--end col--> 
            <div class="col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="col-3">
                                <i class="ti ti-credit-card font-36 align-self-center text-dark"></i>
                            </div><!--end col-->
                            <div class="col-12 ms-auto align-self-center">
                                <div id="dash_spark_3" class="mb-3"></div>
                            </div><!--end col-->
                            <div class="col-12 ms-auto align-self-center">
                                <h3 class="text-dark my-0 font-22 fw-bold"><?php echo e($payment); ?></h3>
                                <p class="text-muted mb-0 fw-semibold">To'lovlar</p>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body--> 
                </div><!--end card-->                                     
            </div> <!--end col--> 
            
            <div class="col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row d-flex">
                            <div class="col-3">
                                <i class="ti ti-confetti font-36 align-self-center text-dark"></i>
                            </div><!--end col-->
                            <div class="col-auto ms-auto align-self-center">
                                <span class="badge badge-soft-danger px-2 py-1 font-11">-2%</span>
                            </div><!--end col-->
                            <div class="col-12 ms-auto align-self-center">
                                <div id="dash_spark_4" class="mb-3"></div>
                            </div><!--end col-->
                            <div class="col-12 ms-auto align-self-center">
                                <h3 class="text-dark my-0 font-22 fw-bold"><?php echo e($bot); ?></h3>
                                <p class="text-muted mb-0 fw-semibold">Botlar</p>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body--> 
                </div><!--end card-->                                     
            </div> <!--end col-->                                                                   
        </div><!--end row-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">To'lovlar statistikasi</h4>                      
                            </div><!--end col-->
                            
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="">
                            <div id="ana_dash_1" class="apex-charts"></div>
                        </div> 
                    </div><!--end card-body--> 
                </div><!--end card-->
            </div>
        </div> 
    </div><!--end col-->                        
</div><!--end row-->



<!--Start Footer-->
<!-- Footer Start -->
<footer class="footer text-center text-sm-start">
&copy; <script>
    document.write(new Date().getFullYear())
</script> Unikit <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
        class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
</footer>
<!-- end Footer -->                
<!--end footer-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/biznesavtomat/data/www/biznesavtomat.uz/project/resources/views/home.blade.php ENDPATH**/ ?>