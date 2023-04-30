@extends('layouts.master')

@section('content')

<div class="wrapper">
    <div class="d-flex flex-column my-5 ">
        <div class="row justify-content-center">
            <div class="col-2">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">

                        <h3>{{$clients->count()}}</h3>

                        <p>Clients</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="{{route('clients.index')}}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-2">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$rooms->count()}}</h3>

                        <p>Chambres</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-hotel"></i>
                    </div>
                    <a href="{{route('rooms.index')}}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-2">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$reservations->count()}}</h3>

                        <p>Reservations</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-signature"></i>
                    </div>
                    <a href="{{route('reservations.index')}}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

        </div>
        <section class="d-flex flex-row justify-content-center">
            <p>Histouriques </p>

        </section>
        <div class="d-flex flex-row justify-content-center">
            <div class="card col-6 ">

                <table class="table table-striped projects">
                    <thead>
                    <tr>

                        <th style="width: 20%"class="text-center">
                            date de l' operation
                        </th>
                        <th style="width: 20%"class="text-center">
                            sujet
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($history as $histories)




                        <tr class="bg-{{$histories->type}} bg-opacity-75" >




                            <td class="text-center">

                                {{$histories->created_at}}
                            </td>




                            <td class="text-center">
                                {{$histories->subject}}

                            </td>



                        </tr>



                    @endforeach





                    </tbody>
                </table>
                <div>{{$history->links()}} </div>
            </div>
        </div>
    </div>
</div>
@endsection
