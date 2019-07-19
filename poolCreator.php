<script>
    function showRides() {
        window.location.href = '?p=poolList';
    }
</script>


<h2 style="text-align: center">Carpool created using information submitted by you during registration
    and is now visible to people working at your company!</h2>
<form>
    <h2 style="text-align: center">Give the date-interval and weekdays when you are able to offer carpools.
    </h2>
    <input type="date" name="startDate" id="dateData">
    <h1>-</h1>
    <input type="date" name="endDate" id="dateData">
    <br>
    <h2 style="text-align: center">On PC, hold shift to select multiple days!</h2>
    <select name="weekDays" size="7" multiple>
    <option value="monday">Monday</option>
    <option value="tuesday">Tuesday</option>
    <option value="wednesday">Wednesday</option>
    <option value="thursday">Thursday</option>
    <option value="friday">Friday</option>
    <option value="saturday">Saturday</option>
    <option value="sunday">Sunday</option>
</select>
    <input style="margin-left: 5%" type="button" value="Show rides" onclick="showRides()">
</form>