<script>
    function showRides() {
        window.location.href = '?p=poolList';
    }
</script>


<h2 style="text-align: center">Carpool created using information submitted by you during registration
    and is now visible to people working at your company!</h2>
<form>
    <h2 style="text-align: center">Give the days when you are able to offer carpools.
    </h2>
    <input type="date" name="dateData" id="dateData">
    <input style="margin-left: 5%" type="button" value="Show rides" onclick="showRides()">
</form>