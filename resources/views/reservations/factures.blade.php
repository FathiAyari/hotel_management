@extends('layouts.master')
@section('content')
    <div class="wrapper">
        <!-- fonction js -->


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header d-flex flex-row justify-content-center">
                <p>Gestion de factures </p>

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





                </div><!-- /.container-fluid -->
            </section>

            <section class="content">

                <div class="card  ">

                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>

                                <th style="width: 20%" class="text-center">
                                    client
                                </th>
                                <th style="width: 20%" class="text-center">
                                    date debut

                                </th>
                                <th style="width: 40%" class="text-center">
                                    date fin

                                </th>
                                <th style="width: 40%" class="text-center">
                                    option

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $res)




                                <tr>





                                    <td class="text-center">
                                        {{$res->client->name}}

                                    </td>


                                    <td class="project_progress text-center">
                                        {{$res->start}}

                                    </td>
                                    <td class="project_progress text-center">
                                        {{$res->end}}

                                    </td>
                                    <td class="project-actions justify-content-center d-flex ">





                                        <div class="d-flex flex-row">
                                            <div class="col">
                                                <a href="{{route("pdf",['id' => $res->id])}}" class="btn btn-primary">  <i class="fa-regular fa-file-pdf"></i>Telecharger</a>


                                            </div>
                                            <div class="col">
                                                <form action="{{ route('reservations.destroy',$res) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <!-- pour des raison de securité -->
                                                    <button type="submit" class="btn btn-danger btn-sm m-1">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>


                                    </td>

                                </tr>



                            @endforeach


                            </tbody>
                        </table>
                        <div class="m-5  d-flex flex-row justify-content-center  ">
                            <div>{{$reservations->links()}} </div>

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
