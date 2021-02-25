<div id="edit-modal">
    <div class="shadow"></div>
    <div class="modal">
        <form name="time-edit" action="/time-logs" method="post">
            @method('PUT')
        <div class="row">
            <div class="left-pane col col-sm-12 col-lg-4">
                <div class="form-control">
                    <label for="date-edit">Date</label>
                    <input id="date-edit" type="date" name="log_date" required>
                </div>
                <div class="form-control">
                    <label for="location-edit">Location</label>
                    <select id="location-edit" name="P21_location_id" required>
                        @foreach($locations as $location)
                        <option value="{{$location->p21_location_id}}">{{$location->loc_short_name}}</option>
                        @endforeach
                    </select>
                    {{-- <span class="ui-button-icon ui-icon ui-icon-triangle-1-s"></span> --}}
                </div>
                <div class="form-control">
                    <label for="technician-edit">Technician</label>
                    <select id="technician-edit" name="P21_technician_id" required>
                        <option disabled selected>-- No Location Selected --</option>
                    </select>
                    {{-- <span class="ui-button-icon ui-icon ui-icon-triangle-1-s"></span> --}}
                </div>
                <div class="form-control">
                    <label for="job-type-edit">Job Type</label>
                    <select id="job-type-edit" name="job_type" required>
                        <option disabled selected>-- No Technician Selected --</option>
                    </select>
                    {{-- <span class="ui-button-icon ui-icon ui-icon-triangle-1-s"></span> --}}
                </div>
            </div>
            <div class="right-pane col col-sm-12 col-lg-6">
                <div class="form-control">
                    <label for="job-name-edit">Job Name</label>
                    <input type="text" maxlength="20" id="job-name-edit" name="job_name" required>
                </div>
                <div class="form-control">
                    <label for="comment-edit">Comment</label>
                    <textarea maxlength="100" rows="2" cols="50" id="comment-edit" name="job_comment" placeholder="Enter any comments..."></textarea>
                </div>
                <div id="hours-edit-control"class="form-control">
                    <label for="hours-edit">Hours</label>
                    <input type="number" step="0.25" id="hours-edit" min="0" name="log_hours" max="12" required>
                </div>
                <div id="save-button" class="form-control">
                    <div class="spacer"></div>
                    <button>Save</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>