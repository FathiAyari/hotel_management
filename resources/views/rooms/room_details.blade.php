@extends('layouts.master')
@section('content')
    <div class="wrapper">

        <div class="content-wrapper  ">
            <div class="m-5  d-flex flex-column  align-items-center">


                <div class="d-flex flex-row p-3 ">
                    <di class="font-weight-bold">Numéro de chambre : </di>
                    <di class="  ">{{$room->number}}</di>
                </div>
                <div class="d-flex flex-row p-3 ">
                    <di class="font-weight-bold">Etage : </di>
                    <di class="  ">{{$room->floor}}</di>
                </div>
                <div class="d-flex flex-row p-3">
                    <di class="font-weight-bold">Prix par nuit en DT : </di>
                    <di class=""> {{$room->price}}</di>
                </div>

                <div class="d-flex flex-row p-3">
                    <di class="font-weight-bold">Type  : </di>
                    <di class="">{{$room->type}}</di>
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
