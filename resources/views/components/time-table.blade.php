<div id="time-table">
  <table>
    <thead>
      <tr>
        <td class="edit">Edit</td>
        <td>Date</td>
        <td>Location</td>
        <td>Technician</td>
        <td class="type">Job Type</td>
        <td class="name">Job Name</td>
        <td class="hours">Hours</td>
        <td class="comment">Comment</td>
      </tr>
    </thead>
    <tbody class="clone-container">
        <tr id="clone">
            <td><a href="#" class="edit-button">@include('svg.edit')</a></td>
            <td class="date"></td>
            <td class="location"></td>
            <td class="technician"></td>
            <td class="job-type"></td>
            <td class="job-name"></td>
            <td class="hours"></td>
            <td class="comment"></td>
        </tr>
    </tbody>
    <tbody class="logs">
    {{--  Logs Will be inserted here --}}
    </tbody>
    <tbody class="totals">
        <tr class="total-row">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total Hours:</td>
            <td class="total">0</td>
            <td></td>
        </tr>
    </tbody>
  </table>
</div>