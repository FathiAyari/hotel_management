@extends('layouts.master')
@section('content')
    <div class="wrapper">

        <div class="content-wrapper  ">
            <div class="m-5  d-flex flex-column  align-items-center">
                <!-- display a column and center the content with align items-->
            @if($client->sexe=="Homme")
                    <di class="">
                        <img src="{{asset("dist/img/avatar5.png")}}" class="rounded-circle">
                    </di>
                @else
                    <di class="">
                        <img src="{{asset("dist/img/avatar2.png")}}" class="rounded-circle">
                    </di>
                @endif

                <div class="d-flex flex-row p-3 ">
                    <di class="font-weight-bold">Nom et prénom : </di>
                    <di class="  ">{{$client->name}} {{$client->lastname}}</di>
                </div>
                <div class="d-flex flex-row p-3 ">
                    <di class="font-weight-bold">Numéro portable : </di>
                    <di class="  ">{{$client->gsm}}</di>
                </div>
                <div class="d-flex flex-row p-3">
                    <di class="font-weight-bold">Nationalité : </di>
                    <di class=""> {{$client->nationality}}</di>
                </div>

                <div class="d-flex flex-row p-3">
                    <di class="font-weight-bold">Ville  : </di>
                    <di class="">{{$client->ville}}</di>
                </div>



                <div class="d-flex flex-row p-3">
                    <di class="font-weight-bold">Sexe : </di>
                    <di class="">{{$client->sexe}}</di>
                </div>
                <div class="d-flex flex-row p-3">
                    <di class="font-weight-bold">Type de document  : </di>
                    <di class=""> {{$client->document_type}}</di>
                </div>
                <div class="d-flex flex-row p-3">
                    <di class="font-weight-bold">Numéro de document  : </di>
                    <di class="">{{$client->document_number}}</di>
                </div>

            </div>
        <!-- /.content-wrapper -->



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

@endsection
