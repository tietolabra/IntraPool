<h1>Register new account</h1>
<form method="POST" action="action.php?a=register">
  <h2>First name:</h2>
  <input type="text" name="firstname">
  <br>
  <h2>Last name:</h2>
  <input type="text" name="lastname">
  <br>
  <h2>Email:</h2>
  <input type="email" name="email" required="required">
  <br>
  <h2>Password:</h2>
  <input type="password" id="password" name="password" required="required">
  <br>
  <h2>Password confirmation:</h2>
  <input type="password" name="password2" required="required" oninput="check(this)">
  <br>
  <div id="companyInput">
    <h2>Company:</h2>
    <select id="company" name="company">

    </select>
    <p id="orText">- OR -</p>
  </div>

  <br>
  <button type="button" id="addCompanyButton" onclick="addCompanyForm()">Add new company</button>
  <div id="companyForm">
    <h2>Company name:</h2>
    <input type="text" name="cName">
    <br>
    <h2>Company street address:</h2>
    <input type="text" name="cStreet">
    <br>
    <h2>Company city:</h2>
    <input type="text" name="cCity">
    <h2>Company ZIP-code:</h2>
    <input type="text" name="cAreacode">
    <br>
    <hr>
  </div>
  <br>
  <h2>Street:</h2>
  <input type="text" name="street">
  <br>
  <h2>City:</h2>
  <input type="text" name="city">
  <br>
  <h2>ZIP-code:</h2>
  <input type="text" name="areacode">
  <br>
  <br>
  <h2 style="text-align: center">By pressing submit you accept us storing the information you entered on this form. The
    information will be saved to
    our database securely. Your information will only be displayed to people working in your company.</h2>
  <input type="submit" id="submitButton" value="Submit">
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

  $(function () {
    $('#companyForm').hide();

    $.getJSON("action.php?a=getAllComs", data => {
      companies = {};
      for (let i = 0; i < data.length; i++) {
        row = data[i];
        companies[row["name"]] = row["name"];
      }
      $.each(companies, function (k, v) {
        $("#company").append($('<option>', { k: v }).text(v));
      });
    });


    $.widget("custom.combobox", {
      _create: function () {
        this.wrapper = $("<span>")
          .addClass("custom-combobox")
          .insertAfter(this.element);

        this.element.hide();
        this._createAutocomplete();
        //this._createShowAllButton();
      },

      _createAutocomplete: function () {
        var selected = this.element.children(":selected"),
          value = selected.val() ? selected.text() : "";

        this.input = $("<input>")
          .appendTo(this.wrapper)
          .val(value)
          .attr("title", "")
          .addClass("custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left")
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy(this, "_source")
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });

        this._on(this.input, {
          autocompleteselect: function (event, ui) {
            ui.item.option.selected = true;
            this._trigger("select", event, {
              item: ui.item.option
            });
          },

          autocompletechange: "_removeIfInvalid"
        });
      },

      _createShowAllButton: function () {
        var input = this.input,
          wasOpen = false;

        $("<a>")
          .attr("tabIndex", -1)
          .attr("title", "Show All Items")
          .tooltip()
          .appendTo(this.wrapper)
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass("ui-corner-all")
          .addClass("custom-combobox-toggle ui-corner-right")
          .on("mousedown", function () {
            wasOpen = input.autocomplete("widget").is(":visible");
          })
          .on("click", function () {
            input.trigger("focus");

            // Close if already visible
            if (wasOpen) {
              return;
            }

            // Pass empty string as value to search for, displaying all results
            input.autocomplete("search", "");
          });
      },

      _source: function (request, response) {
        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
        response(this.element.children("option").map(function () {
          var text = $(this).text();
          if (this.value && (!request.term || matcher.test(text)))
            return {
              label: text,
              value: text,
              option: this
            };
        }));
      },

      _removeIfInvalid: function (event, ui) {

        // Selected an item, nothing to do
        if (ui.item) {
          return;
        }

        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children("option").each(function () {
          if ($(this).text().toLowerCase() === valueLowerCase) {
            this.selected = valid = true;
            return false;
          }
        });

        // Found a match, nothing to do
        if (valid) {
          return;
        }

        // Remove invalid value
        this.input
          .val("")
          .attr("title", value + " didn't match any item")
          .tooltip("open");
        this.element.val("");
        this._delay(function () {
          this.input.tooltip("close").attr("title", "");
        }, 2500);
        this.input.autocomplete("instance").term = "";
      },

      _destroy: function () {
        this.wrapper.remove();
        this.element.show();
      }
    });

    $("#company").combobox();
  });

  function check(input) {
    if (input.value != document.getElementById('password').value) {
      input.setCustomValidity('Password Must be Matching.');
    }
    else {
      // input is valid -- reset the error message
      input.setCustomValidity('');
    }
  }

  function getLocation() {
    function getLocationConstant() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
      }
      else {
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