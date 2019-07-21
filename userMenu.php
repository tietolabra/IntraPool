<script>
    function createRide() {
        window.location.href = '?p=poolCreator';
    }
    function showRides() {
        window.location.href = '?p=poolList';
    }
</script>
<div class="text-center">
<h1 style="font-size:25px;">Are you driving or getting a ride?</h1>
<form>
    <p class="mt-md-5">Selecting this option will create a carpool that will be visible to usersfrom your company.
    </p>
    <input type="button" class="btn btn-outline-primary btn-lg" value="Offer car pooling" onclick="createRide()">
    <p class="mt-md-5">Selecting this option will show the carpools available in your company.</p>
    <input type="button" class="btn btn-outline-primary btn-lg mb-md-5" value="List car pools in your company" onclick="showRides()" style="margin-bottom:5%;">
    <br>
</form>
</div>