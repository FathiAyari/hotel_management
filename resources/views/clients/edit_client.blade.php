@extends('layouts.master')
@section('content')
    <div class="content-wrapper">


    <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card  ">

                <div class="card-body p-0">
                    <div class=" col-12 d-flex flex-row justify-content-center">
                        <div class="col-6">
                            <form action="{{ route('clients.update',$client) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" name="name"  value="{{$client->name}}">
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="lastname">Prénom</label>
                                    <input type="text" class="form-control" name="lastname"  value="{{$client->lastname}}">
                                    @error('lastname')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="nationality">Nationalité</label>
                                    <input type="text" class="form-control" name="nationality"  value="{{$client->nationality}}">
                                    @error('nationality')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="ville">Ville</label>
                                    <input type="text" class="form-control" name="ville"  value="{{$client->ville}}">
                                    @error('ville')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>






                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control custom-select" name="type">
                                        <option value="{{$client->type}}" disabled selected hidden>{{$client->type}}</option>
                                        <option value="Mourale" selected>Mourale</option>
                                        <option value="Physique" selected>Physique</option>


                                    </select>

                                </div>

                                <div class="d-flex flex-row ">
                                    <div class="form-group col-6">
                                        <label for="inputStatus">Document</label>
                                        <select class="form-control custom-select" name="document_type">
                                            <option value="{{$client->document_type}}" disabled selected hidden>{{$client->document_type}}</option>
                                            <option value="Cin" selected>Cin</option>
                                            <option value="Passeport" selected>Passeport</option>
                                            <option value="Carte de Sejour" selected>Carte de sejour</option>


                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Numéro de document</label>
                                        <input type="text" class="form-control" id="zip" required name="document_number"
                                               value="{{$client->document_number}}">
                                        @error('document_number  ')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                </div>



                                <div class="d-flex flex-row justify-content-center"><button type="submit" class="btn btn-primary">Modifier</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
