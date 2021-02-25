<div id="locate-record">
    <div class="heading">Locate A record</div>
    <form name="locate-record" action="/time-logs">
        <div class="content row">
            <div class="form-control col col-sm-12 col-lg-4">
                <label for="date">Date</label>
                <input id="date" type="date" name="log_date" required value="{{now()->format('Y-m-d')}}">
            </div>
            <div class="form-control col col-sm-12 col-lg-4">
                <label for="location">Location</label>
                <select id="location" name="P21_location_id" required>
                <option value selected disabled></option>
                    @foreach($locations as $location)
                        <option value="{{$location->p21_location_id}}">{{$location->loc_short_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control col col-sm-12 col-lg-4">
                <label for="technician">Technician</label>
                <select id="technician" name="P21_technician_id" required>
                    <option disabled selected>-- No Location Selected --</option>
                </select>
            </div>

        </div>
        <div class="button-container">
            <button>Search</button>
        </div>
    </form>
</div>