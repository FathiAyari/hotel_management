<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Envoyer un message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="1">Nom</label>
                        <input type="text" class="form-control" id="1" aria-describedby="emailHelp" name="name" required>

                    </div>
                    <div class="form-group">
                        <label for="2">Prénom</label>
                        <input type="text" class="form-control" id="2" aria-describedby="emailHelp" name="lastname" required>

                    </div>
                    <div class="form-group">
                        <label for="3">Adresse email</label>
                        <input type="email" class="form-control" id="3" aria-describedby="emailHelp" name="email" required >

                    </div>
                    <div class="form-group">
                        <label for="4">Message</label>
                        <textarea class="form-control" name="message"  aria-required  id="4" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit"  class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
