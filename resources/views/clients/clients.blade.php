@extends('layouts.master')
@section('content')
    <div class="wrapper">
        <!-- fonction js -->


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header d-flex flex-row justify-content-center">
                <p>Gestion de clients </p>

            </section>
            <section class="content-header">
                <div class="container-fluid  ">
                    @if($message=Session::get('success'))
                        <div class="alert alert-success" role="alert">{{ $message }}</div>
                    @endif
                    @if($message=Session::get('delete'))
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @endif
                    @if($message=Session::get('update'))
                        <div class="alert alert-info" role="alert">{{ $message }}</div>
                    @endif

                    <div class="d-flex justify-content-between">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i
                                class="fa-solid fa-plus"></i>Ajouter un client
                        </button>


                    </div>



                </div><!-- /.container-fluid -->
            </section>
            <!-- Modal -->
        @include("clients.add_client_modal")
        <!-- heritage de modale de l'ajout de client -->
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card  ">

                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>

                                <th style="width: 20%" class="text-center">
                                    Nom et Prénom de client
                                </th>
                                <th style="width: 20%" class="text-center">
                                    Nationalité
                                </th>
                                <th style="width: 20%" class="text-center">
                                    Type de client

                                </th>
                                <th style="width: 40%" class="text-center">
                                    Options

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)




                                <tr>


                                    <td class="text-center">
                                        {{$client->name}}
                                        {{$client->lastname}}

                                    </td>


                                    <td class="text-center">
                                        {{$client->nationality}}

                                    </td>


                                    <td class="project_progress text-center">
                                        {{$client->type}}

                                    </td>

                                    <td class="project-actions justify-content-center d-flex ">



                                        <a href="{{route("clients.edit",$client)}}" class="btn btn-info btn-sm m-1"><i
                                                class="fas fa-pencil-alt"></i> Modifier</a>
                                        <a href="{{route("clients.show",$client)}}"
                                           class="btn btn-primary btn-sm m-1"><i class="fa-solid fa-eye"></i>Voir</a>


                                        <form action="{{ route('clients.destroy',$client) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <!-- pour des raison de securité -->
                                            <button type="submit" class="btn btn-danger btn-sm m-1">
                                                <i class="fas fa-trash">
                                                </i>
                                                Supprimer
                                            </button>
                                        </form>


                                    </td>
                                </tr>



                            @endforeach


                            </tbody>
                        </table>
                        <div class="m-5  d-flex flex-row justify-content-center  ">
                            <div>{{$clients->links()}} </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>


@endsection
