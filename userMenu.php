<script>
    function createRide() {
        window.location.href = '?p=poolCreator';
    }
    function showRides() {
        window.location.href = '?p=poolList';
    }
</script>

<h1 style="font-size: 25px">Are you driving or getting a ride?</h1>
<form>
    <h2 style="text-align: center">Selecting this option will create a carpool that will be visible to usersfrom your company.
    </h2>
    <input style="margin-left: 5%" type="button" value="Driving" onclick="createRide()">
    <h2 style="text-align: center">Selecting this option will show the carpools available in your company.</h2>
    <input style="margin-left: 5%" type="button" value="Getting a ride" onclick="showRides()">
</form>