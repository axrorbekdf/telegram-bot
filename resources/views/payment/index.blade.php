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
                        <li class="breadcrumb-item active">To'lovlari</li>
                    </ol>
                </div>
                <h4 class="page-title">To'lovlari</h4>
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
                            <h4 class="card-title">Klientlar to'lovlari ro'yhati</h4>
		                    <p class="text-muted mb-0">
		                        Bu yerda barcha klientlar to'lovlari haqida ma'lumotlarni olish mumkin.
		                    </p>          
                        </div><!--end col-->    
                        <div class="col-auto">                      
                            <!-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                <i class="ti ti-plus menu-icon"></i> Yangi yaratish
                            </button>   -->             
                        </div><!--end col-->                                        
                    </div>  <!--end row-->                                  
                </div><!--end card-header-->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0" id="datatable_1">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>UserId</th>
                                <th>Tarif</th>
                                <th>Provider</th>
                                <th>Valyuta</th>
                                <th>Summa</th>
                                <th>Payload</th>
                                <th>Info</th>
                                <th style="width: 200px">Sana</th>
                                <th class="text-end" style="width: 200px">Amal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $item)
	                            <tr>
	                                <td>{{ $item->id }}</td>
	                                <td>{{ $item->client->first_name }} {{ $item->client->last_name }} <a href="https://t.me/{{$item->client->username}}">{{ "@".$item->client->username }} </a></td>
                                    <td>{{ $item->rate->name ?? $item->rate_id }}</td>
                                    <td>{{ $item->provider->name ?? $item->provider_id }}</td>
                                    <td>{{ $item->currency }}</td>
                                    <td>{{ $item->total_amount }}</td>
                                    <td>{{ $item->invoice_payload }}</td>
                                    <td>{{ $item->order_info }}</td>
	                                <td>{{ $item->created_at }}</td>
	                                <td class="text-end">                                                       
	                                    <!-- <a href="{{ route('rate.edit', ['rate' => $item]) }}"><i class="btn las la-pen text-secondary font-16"></i></a>
	                                    <a href="{{ route('rate.delete', ['rate' => $item]) }}" onclick="return confirm('Rostdan o`chirmoqchimisiz')"><i class="btn las la-trash-alt text-secondary font-16"></i></a> -->
	                                </td>
	                            </tr>
                            @endforeach
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
                    <h4 class="card-title">Tarif:  {{ $rate->name }}  o'zgartirilmoqda!</h4>
                    <p class="text-muted mb-0">
                    	Ma'lumotlar o'zgartirish shu yerda amalga oshadi.
                    </p>
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                    
                    	<form action="{{ route('rate.update', ['rate'=> $rate]) }}" method="POST">
            				@csrf
                            <div class="mb-3">
		                        <label for="example-text-input">Nomi</label>
		                        <input class="form-control" type="text" name="name" value="{{ $rate->name }}"> 
		                    </div>   
		                    <div class="mb-3">
		                        <label for="example-text-input">Izohi</label>
		                        <textarea name="description" class="form-control" rows="5">{{ $rate->description }}</textarea>
		                    </div>  
		                    <div class="mb-3">
		                        <label for="example-text-input">Narxi</label>
		                        <input class="form-control" type="number" name="price" value="{{ $rate->price }}">
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
            <form action="{{ route('rate.store') }}" method="POST">
            	@csrf
		        <div class="modal-body">
		            <div class="row">
		                <div class="col-lg-12">
		                    <div class="mb-3 row">
		                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Nomi</label>
		                        <div class="col-sm-10">
		                            <input class="form-control" type="text" name="name">
		                        </div>
		                    </div>   
		                    <div class="mb-3 row">
		                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Izohi</label>
		                        <div class="col-sm-10">
		                            <textarea name="description" class="form-control" rows="5"></textarea>
		                        </div>
		                    </div>  
		                    <div class="mb-3 row">
		                        <label for="example-text-input" class="col-sm-2 col-form-label text-end">Narxi</label>
		                        <div class="col-sm-10">
		                            <input class="form-control" type="number" name="price">
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
