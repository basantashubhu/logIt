<div id="time-entry">
    <form name="time-entry"action="/time-logs" method="POST">
        <div class="row">
            <div class="left-pane col col-sm-12 col-lg-4">
                <div class="form-control">
                    <label for="date">Date</label>
                    <input id="date" type="date" name="log_date" required value="{{now()->format('Y-m-d')}}">
                </div>
                <div class="form-control location">
                    <label for="location">Location</label>
                    <select id="location" name="P21_location_id" required>
                    <option value selected disabled></option>
                        @foreach($locations as $location)
                            <option value="{{$location->p21_location_id}}">{{$location->loc_short_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control technician">
                    <label for="technician">Technician</label>
                    <select id="technician" name="P21_technician_id" required>
                        <option disabled selected>-- No Location Selected --</option>
                    </select>
                </div>
                <div class="form-control job-type">
                    <label for="job-type">Job Type</label>
                    <select id="job-type" name="job_type" required>
                        <option disabled selected>-- No Technician Selected --</option>
                    </select>
                </div>
            </div>
            <div class="right-pane col col-sm-12 col-lg-8">
                <div class="form-control">
                    <label for="job-name">Job Name</label>
                    <input type="text" maxlength="20" id="job-name" name="job_name" required placeholder="Job name...">
                </div>
                <div class="form-control">
                    <label for="comment">Comment</label>
                    <textarea maxlength="100" rows="2" id="comment" name="job_comment" placeholder="Enter any comments..."></textarea>
                </div>
                <div id="hours-control" class="form-control">
                    <label for="hours">Hours</label>
                    <input type="number" step="0.25" min="0" id="hours" name="log_hours" max="24" required>
                </div>
                <div id="save-button" class="form-control">
                    <div class="spacer"></div>
                    <button>Save</button>
                </div>
            </div>
        </div>
    </form>

</div>