@extends('layouts.app')
@section('css-link')
<link href="{{ asset('assets/plugins/datatables/datatable.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container-fluid">

	<!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Vuacher</li>
                    </ol>
                </div>
                <h4 class="page-title">Vuacherlar</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        
        @if(isset($type))
        <div class="col-lg-8">
        @else
        <div class="col-lg-12">
        @endif
            <div class="card">
                
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">                      
                            <h4 class="card-title">Klientlarga berilgan vuacher ro'yhati</h4>
		                    <p class="text-muted mb-0">
		                        Bu yerda barcha vuacherni yaratish, ko'rish, o'zgartirish, o'chirish amallarini bajarish mumkin.
		                    </p>          
                        </div><!--end col-->    
                        <div class="col-auto">                      
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                <i class="ti ti-plus menu-icon"></i> Yangi yaratish
                            </button>               
                        </div><!--end col-->                                        
                    </div>  <!--end row-->                                  
                </div><!--end card-header-->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0" id="datatable_1">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <!--<th>Klient</th>-->
                                <th>Tarif</th>
                                <!--<th>Tolov</th>-->
                                <th>Login</th>
                                <th>Password</th>
                                <th>Turi</th>
                                <th style="width: 200px">Sana</th>
                                <th class="text-end" style="width: 200px">Amal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($vuachers)
                            @foreach($vuachers as $item)
	                            <tr>
	                                <td>{{ $item->id }}</td>
	                                
	                                <td>{{ $item->rate->name ?? ''}} ({{ $item->rate->button_name ?? '' }})</td>
	                                
	                                <td>{{ $item->login }}</td>
	                                <td>{{ $item->password }}</td>
	                                <td>{{ $item->type }}</td>
	                                <td>{{ $item->created_at }}</td>
	                                <td class="text-end">                                                       
	                                    <!--<a href="{{ route('vuacher.reload', ['vuacher' => $item]) }}"><i class="mdi mdi-reload text-muted font-18"></i></a>-->
	                                    <a href="{{ route('vuacher.edit', ['vuacher' => $item]) }}"><i class="btn las la-pen text-secondary font-16"></i></a>
	                                    <a href="{{ route('vuacher.delete', ['vuacher' => $item]) }}" onclick="return confirm('Rostdan o`chirmoqchimisiz')"><i class="btn las la-trash-alt text-secondary font-16"></i></a>
	                                </td>
	                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->

        @if(isset($type))
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tarif:  {{ $vuacher->name }}  o'zgartirilmoqda!</h4>
                    <p class="text-muted mb-0">
                    	Ma'lumotlar o'zgartirish shu yerda amalga oshadi.
                    </p>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                    
                    	<form action="{{ route('vuacher.update', ['vuacher'=> $vuacher]) }}" method="POST">
            				@csrf
                      <!--      <div class="mb-3">-->
		                    <!--    <label for="example-text-input">Klient</label>-->
		                    <!--    <input class="form-control" type="text" name="userid" value="{{ $vuacher->userid }}"> -->
		                    <!--</div>-->
		                    <!--<div class="mb-3">-->
		                    <!--    <label for="example-text-input">To'lov</label>-->
		                    <!--    <input class="form-control" type="text" name="payment_id" value="{{ $vuacher->payment_id }}"> -->
		                    <!--</div>-->
		                    <div class="mb-3">
		                        <label for="example-text-input">Tarif</label>
		                        <select class="form-select" name="rate_id" aria-label="" required>
                                    <option value="" selected="">Tarifni tanlang!</option>
                                    @foreach($rates as $item)
                                        <option {{ ($vuacher->rate_id==$item->id) ? "selected":"" }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('rate_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
		                    </div>
		                    <div class="mb-3">
		                        <label for="example-text-input">Login</label>
		                        <input class="form-control" type="text" name="login" value="{{ $vuacher->login }}"> 
		                        @error('rate_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
		                    </div>
		                    <div class="mb-3">
		                        <label for="example-text-input">Password</label>
		                        <input class="form-control" type="text" name="password" value="{{ $vuacher->password }}"> 
		                        @error('rate_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
		                    </div>
                             
                            <button type="submit" class="btn btn-de-primary">Saqlash</button>

                        </form>     

                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
        @endif
    </div> <!-- end row -->

</div><!-- container -->



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0" id="exampleModalCenterTitle">Tarif yaratish</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!--end modal-header-->
            <form action="{{ route('vuacher.store') }}" method="POST">
            	@csrf
            	<!--clients-->
		        <div class="modal-body">
		            <div class="row">
		                <div class="col-lg-12">
		                    <!--<div class="mb-3 row">-->
		                    <!--    <label for="example-text-input" class="col-sm-2 col-form-label text-end">Klient</label>-->
		                    <!--    <div class="col-sm-10">-->
		                    <!--        <select class="form-select" name="userid" aria-label="">-->
                      <!--                  <option selected="">Foydalanuvchini tanlang!</option>-->
                      <!--                  @foreach($clients as $item)-->
                      <!--                      <option value="{{ $item->userid }}">{{ $item->first_name }} {{ $item->last_name }} ({{ $item->username }})</option>-->
                      <!--                  @endforeach-->
                      <!--              </select>-->
		                    <!--    </div>-->
		                    <!--</div>-->
		                    <div class="mb-3 row">
		                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Tarif</label>
		                        <div class="col-sm-10">
		                            
		                            <select class="form-select" name="rate_id" aria-label="" required>
                                        <option value="" selected="">Tarifni tanlang!</option>
                                        @foreach($rates as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
		                        </div>
		                    </div>
		                    <!--<div class="mb-3 row">-->
		                    <!--    <label for="example-text-input" class="col-sm-2 col-form-label text-end">To'lov</label>-->
		                    <!--    <div class="col-sm-10">-->
		                    <!--        <input class="form-control" type="text" name="payment_id">-->
		                            
		                            <!--<select class="form-select" name="payment_id" aria-label="" id="client_payments">-->
                              <!--          <option selected="">To'lovni tanlang!</option>-->
                              <!--      </select>-->
                              
		                    <!--    </div>-->
		                    <!--</div>-->
		                    <div class="mb-3 row">
		                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Login</label>
		                        <div class="col-sm-10">
		                            <input class="form-control" type="text" name="login" required>
		                        </div>
		                    </div>
		                    <div class="mb-3 row">
		                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Password</label>
		                        <div class="col-sm-10">
		                            <input class="form-control" type="text" name="password" required>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div><!--end modal-body-->
		        <div class="modal-footer">
		            <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Close</button>
		            <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
		        </div><!--end modal-footer-->
			</form>
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div><!--end modal-->


<!--Start Footer-->
<!-- Footer Start -->
<footer class="footer text-center text-sm-start">
   &copy; <script>
       document.write(new Date().getFullYear())
   </script> Unikit <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
           class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
</footer>
@endsection

@section('script-link')
    <!-- Javascript  -->
    <script src="{{ asset('assets/plugins/datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/pages/datatable.init.js') }}"></script>
@endsection

@section('script')
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#client_payments").click(function(e){
  
        <!--e.preventDefault();-->
   
        var user_id = $("select[name=userid]").val();

        $.ajax({
           type:'POST',
           url:"{{ route('vuacher.client.payments') }}",
           data:{ userid:user_id },
           success:function(data){
           	    
                data.forEach(function(value, index, array) {
                    console.log(value)
                    $(this).append("<option value="">asdasdasd</option");

                });
                
           }
        });   
  
    });
@endsection
