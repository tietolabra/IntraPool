<h1>Register new account</h1>
<form method="POST" action="action.php?a=register">
  <div class="form-group">
    <label>First name:</label>
    <input class="form-control" type="text" name="firstname">
  </div>
  <div class="form-group">
    <label>Last name:</label>
    <input class="form-control" type="text" name="lastname">
  </div>
  <div class="form-group">
    <label>Email:</label>
    <input class="form-control" type="email" name="email" required="required">
  </div>
  <div class="form-group">
    <label>Password:</label>
    <input class="form-control" type="password" id="password" name="password" required="required">
  </div>
  <div class="form-group">
    <label>Password confirmation:</label>
    <input class="form-control" type="password" name="password2" required="required" oninput="check(this)">
  </div>
  <div class="form-group">
    <div id="companyInput">
      <label>Company:</label>
      <select id="company" class="form-control" name="company">
<option>Choose your company</option>
      </select>
      <p id="orText">- OR -</p>
    </div>
  </div>

  <div class="form-group">
    <button type="button" id="addCompanyButton" class="btn btn-primary btn-md mb-md-4" onclick="addCompanyForm()">Add new company</button>
    <div id="companyForm">
      <div class="form-group">
        <label>Company name:</label>
        <input class="form-control" type="text" name="cName">
      </div>
      <div class="form-group">
        <label>Company street address:</label>
        <input class="form-control" type="text" name="cStreet">
      </div>
      <div class="form-group">
        <label>Company city:</label>
        <input class="form-control" type="text" name="cCity">
      </div>
      <div class="form-group">
        <label>Company ZIP-code:</label>
        <input class="form-control" type="text" name="cAreacode">
      </div>
      <hr>
    </div>
    <div class="form-group">
      <label>Street:</label>
      <input class="form-control" type="text" name="street">
    </div>
    <div class="form-group">
      <label>City:</label>
      <input class="form-control" type="text" name="city">
    </div>
    <div class="form-group">
      <label>ZIP-code:</label>
      <input class="form-control" type="text" name="areacode">
    </div>
    <p>By pressing submit you accept us storing the information you entered on this form. The
      information will be saved to
      our database securely. Your information will only be displayed to people working in your company.</p>
    <input type="submit" class="btn btn-success btn-lg" id="submitButton" value="Submit">
</form>

<script>
  addCompanyButtonStr = ["Add new company", "Choose existing company"];
  addCompanyButtonSwitch = 0;

  function addCompanyForm() {
    $('#companyInput').slideToggle();
    $('#companyForm').slideToggle();
    addCompanyButtonSwitch++;
    $('#addCompanyButton').text(addCompanyButtonStr[addCompanyButtonSwitch % 2]);
  }

  $(function() {
    $('#companyForm').hide();

    $.getJSON("action.php?a=getAllComs", data => {
      companies = {};
      for (let i = 0; i < data.length; i++) {
        row = data[i];
        companies[row["name"]] = row["name"];
      }
      $.each(companies, function(k, v) {
        $("#company").append($('<option>', {
          k: v
        }).text(v));
      });
    });

  });

  function check(input) {
    if (input.value != document.getElementById('password').value) {
      input.setCustomValidity('Password Must be Matching.');
    } else {
      // input is valid -- reset the error message
      input.setCustomValidity('');
    }
  }

  function getLocation() {
    function getLocationConstant() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
      } else {
        alert("Your browser or device doesn't support Geolocation");
      }
    }
  }

  function onGeoSuccess(event) {
    document.getElementById("latitude").value = event.coords.latitude;
    document.getElementById("longitude").value = event.coords.longitude;
  }

  function onGeoError(event) {
    alert("Error code " + event.code + ". " + event.message);
  }
</script>