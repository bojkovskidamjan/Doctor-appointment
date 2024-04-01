@if (count($bookings) > 0)
    <div class="modal fade" id="modal{{$booking->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{route('prescription')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Prescription</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="app">
                        <input type="hidden" name="user_id" value="{{$booking->user_id}}">
                        <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
                        <input type="hidden" name="date" value="{{$booking->date}}">

                        <div class="form-group">
                            <label>Disease</label>
                            <input type="text" name="name_of_disease" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Symptoms</label>
                            <textarea name="symptoms" class="form-control" placeholder="symptoms"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Medicine</label>
                            <add-button></add-button>
                        </div>
                        <div class="form-group">
                            <label>Procedure to use the medicine</label>
                            <textarea name="procedure_to_use_medicine" class="form-control" placeholder="symptoms"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Feedback</label>
                            <textarea name="feedback" class="form-control" placeholder="symptoms"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Signature</label>
                            <input type="text" name="signature" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif
