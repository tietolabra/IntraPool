<script>
    function showRides() {
        window.location.href = '?p=poolList';
    }

    function mainMenu() {
        window.location.href = '?p=userMenu';
    }
</script>
<input type="button" class="btn btn-outline-primary btn-lg mb-md-5" value="Return to mainmenu" onclick="mainMenu()">
<form action="action.php?a=addPool" method="POST">
    <div class="form-group">
        <label>Give the date-interval and weekdays when you are able to offer carpools.
        </label>
        <input class="form-control" type="date" name="startDate" id="dateData" required>
    </div>
    <label>-</label>
    <input class="form-control" type="date" name="endDate" id="dateData" required>
    </div>
    <div class="form-group">
        <label>On PC, hold shift to select multiple days!</label>
        <select class="form-control" id="daySelector" name="weekDays[]" size="7" multiple>
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
            <option value="saturday">Saturday</option>
            <option value="sunday">Sunday</option>
        </select>
    </div>
    <div class="form-group">
        <label>Input your working hours:</label>
        <input class="form-control" type="time" id="startTime" name="startTime" required>
        <input class="form-control" type="time" id="endTime" name="endTime" required>
    </div>
    <div class="form-group">
        <label>How many people are you willing to carpool with?</label>
        <input class="form-control" type="number" name="seats" id="seatNumber" required>
    </div>
    <input type="submit" class="btn btn-success btn-md m-md-4" value="Submit carpool" onclick="showRides()">
</form>