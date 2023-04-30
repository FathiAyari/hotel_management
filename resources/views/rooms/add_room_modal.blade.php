<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une chambre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rooms.store') }}" method="POST">
                    @csrf


                    <div class="d-flex flex-row">

                        <div class="form-group p-1">
                            <label for="number">Numéro de chambre</label>
                            <input type="text" class="form-control" name="number" required id="number"
                                   aria-describedby="emailHelp" required>

                        </div>


                        <div class="form-group p-1">
                            <label for="floor">Etage</label>
                            <input type="text" class="form-control" name="floor" id="floor" required
                            >
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="price">Prix de nuit</label>
                        <input type="number" class="form-control" name="price" min="0" required>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Single" name="type" id="flexRadioDefault1" required>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Single
                        </label>
                    </div>




                    <div class="form-check">
                        <input class="form-check-input" value="Double" type="radio" name="type" id="flexRadioDefault2" required>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Double
                        </label>
                    </div>









                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Confirmer</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
