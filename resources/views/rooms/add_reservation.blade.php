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
                            <form action="{{ route('reservations.store') }}" method="POST">
                                @csrf
                                <input type="hidden"  name="room_id" value="{{$id}}">
                                <div class="form-group">
                                    <label for="number">Date de debut</label>
                                    <input type="date" class="form-control" name="start"  required>
                                    @error('number')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="number">Date de fin</label>
                                    <input type="date" class="form-control" name="end" required >
                                    @error('number')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="number">Extra</label>
                                    <input type="number" class="form-control" name="extra" value="0" >
                                    @error('number')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="number">Consommation</label>
                                    <input type="number" class="form-control" name="consumption" value="0" >
                                    @error('number')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Client</label>
                                    <select class="form-control custom-select" name="client_id">


                                        @foreach ($clients as $client )

                                            <option value="{{ $client->id }}">{{ $client->name }}{{ $client->lastname }}</option>


                                        @endforeach




                                    </select>
                                    @error('description')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                <div class="d-flex flex-row justify-content-center"><button type="submit" class="btn btn-primary">Reserver</button></div>
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
