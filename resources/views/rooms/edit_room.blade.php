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
                            <form action="{{ route('rooms.update',$room) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="number">Numéero de chambre</label>
                                    <input type="text" class="form-control" name="number"  value="{{$room->number}}">
                                    @error('number')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="floor">L'étage</label>
                                    <input type="text" class="form-control" name="floor"  value="{{$room->floor}}">
                                    @error('floor')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="nationality">Prix de nuit en DT</label>
                                    <input type="text" class="form-control" name="price"  value="{{$room->price}}">
                                    @error('price')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    <label for="ville">Type </label>
                                    <input type="text" class="form-control" name="type"  value="{{$room->type}}">
                                    @error('type')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>


                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="{{$room->type}}" name="type" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Single
                                    </label>
                                </div>




                                <div class="form-check">
                                    <input class="form-check-input" value="Double" type="radio" name="type" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Double
                                    </label>
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
