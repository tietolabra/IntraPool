<script>
    function createRide() {
        window.location.href = '?p=poolCreated';
    }
    function showRides() {
        window.location.href = '?p=poolList';
    }
</script>

<h1 style="font-size: 35px">Are you driving or getting a ride?</h1>
<form>
    <h2 style="text-align: center">Selecting this option will allow you to create a carpool, that will be visible to employees of your company.
    </h2>
    <input style="margin-left: 5%" type="button" value="Driving" onclick="createRide()">
    <h2 style="text-align: center">Selecting this option will show you the carpools available in your company.</h2>
    <input style="margin-left: 5%" type="button" value="Getting a ride" onclick="showRides()">
</form>