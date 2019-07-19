<?php require_once('libs/userData.php'); ?>
<input type="button" class="btn btn-outline-primary btn-lg mb-md-5" value="Return to mainmenu" onclick="mainMenu()">
<h2>CarPool list for <?php getCompanyName(); ?></h2>
<p>This list may display people who work for your company, but at a different location.
  Always contact the listed driver
  and check that everything is in order and that the pool can be a success.</p>
<div id="container">
    <table class="table" id="roundTable">
      <tr>
        <th>Driver name</th>
        <th class="email" >Email</th>
        <th>Location</th>
        <th>Date</th>
        <th>Worktime</th>
      </tr>
    </table>

</div>

<script>
  $(() => {
    $.getJSON('action.php?a=getCompanyPools', (data) => {
      for (poolObject in data) {
        let pool = data[poolObject];
        let startTime = pool["startTime"].split(" ");
        let endTime = pool["endTime"].split(" ");
        let tableRowStr = "<tr>";
        tableRowStr += "<td>" + pool["userName"] + "</td>";
        tableRowStr += "<td>" + pool["email"] + "</td>";
        tableRowStr += "<td>" + pool["userLocation"] + "</td>";
        tableRowStr += "<td>" + startTime[0] + "</td>";
        tableRowStr += "<td>" + startTime[1].substring(0,5) + " - " + endTime[1].substring(0,5) + "</td>";
        tableRowStr += "</tr>";
        $('#roundTable tr:last').after(tableRowStr);
      }
    });
  });

  function mainMenu() {
    window.location.href = '?p=userMenu';
  }

</script>