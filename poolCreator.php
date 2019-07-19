<script>
    function showRides() {
        window.location.href = '?p=poolList';
    }
</script>

<form>
    <h2 style="text-align: center">Give the date-interval and weekdays when you are able to offer carpools.
    </h2>
    <input type="date" name="startDate" id="dateData">
    <h1>-</h1>
    <input type="date" name="endDate" id="dateData">
    <br>
    <h2 style="text-align: center">On PC, hold shift to select multiple days!</h2>
    <select id="daySelector" name="weekDays" size="7" multiple>
    <option value="monday">Monday</option>
    <option value="tuesday">Tuesday</option>
    <option value="wednesday">Wednesday</option>
    <option value="thursday">Thursday</option>
    <option value="friday">Friday</option>
    <option value="saturday">Saturday</option>
    <option value="sunday">Sunday</option>
</select>
    <h2 style="text-align: center">How many people are you willing to carpool with?</h2>
    <input type="number" name="seats" id="seatNumber">
    <br>
    <input style="margin-left: 5%" type="button" value="Show rides" onclick="showRides()">
</form>