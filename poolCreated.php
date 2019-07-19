<script>
    function showRides() {
        window.location.href = '?p=poolList';
    }
    function mainMenu() {
        window.location.href = '?p=userMenu';
    }
</script>

<input type="button" value="Return to mainmenu" onclick="mainMenu()">
<h2 style="text-align: center">Carpool created using information submitted by you during registration
    and is now visible to people working at your company!</h2>
<form>
    <h2 style="text-align: center">Press the button to see carpools of your company</h2>
    <input style="margin-left: 5%" type="button" value="Show rides" onclick="showRides()">
</form