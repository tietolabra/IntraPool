<?php require_once('libs/userData.php'); ?>
<input type="button" style="margin-left: 5%" value="Return to mainmenu" onclick="mainMenu()">
<h1 style="font-size:25px;margin-bottom:0;margin-top:0">CarPool list for <?php getCompanyName(); ?></h1>
<h2 style="text-align: center; font-size:15px">This list may display people who work for your company, but at a different location.
  Always contact the listed driver
  and check that everything is in order and that the pool can be a success.</h2>
<br>
<div id="container">
  <form method="GET">
  <button id="showMailButton" type="button" style="margin-left: 5%" onclick="showMails()">Show emails</button>
    <table id="roundTable">
      <tr>
        <th>Driver name</th>
        <th class="email" style="display:none">Email</th>
        <th>Location</th>
      </tr>
      <tr>
        <td>Erkki Esimerkki</td>
        <td class="email" style="display:none">Erkki.Esimerkki@hamk.fi</td>
        <td class="location">Riihimäki</td>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td class="email" style="display:none">Francisco Chang</td>
        <td class="location">Mexico</td>
      </tr>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td class="email" style="display:none">Francisco Chang</td>
        <td class="location">Mexico</td>
      </tr>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td class="email" style="display:none">Francisco Chang</td>
        <td class="location">Mexico</td>
      </tr>
      </tr>
    </table>
  </form>

</div>

<script>
$(() => {
  $.getJSON('action.php?a=getCompanyPools', (data) => {
    console.log(data);
    for (poolObject in data) {
      console.log(poolObject);
      for (pool in poolObject) {
      console.log(pool);
      let tableRowStr = "<tr>";
      tableRowStr += "<td>"+pool["userName"]+"</td>";
      tableRowStr += "<td>"+pool["email"]+"</td>";
      tableRowStr += "<td>"+pool["userLocation"]+"</td>";
      tableRowStr += "</tr>";
      $('#roundTable tr:last').after(tableRowStr);
      }
    }
  });
});

function mainMenu() {
        window.location.href = '?p=userMenu';
    }

function showMails(){
    var emailElements = document.getElementById('roundTable').getElementsByClassName('email');
    for(var i = 0, length = emailElements.length; i < length; i++) {
      emailElements[i].setAttribute("style", "display:table-cell;");
    }
    var locationElements = document.getElementById('roundTable').getElementsByClassName('location');
    for(var i = 0, length = locationElements.length; i < length; i++) {
      locationElements[i].setAttribute("style", "display:none;");
      locationElements[i].parentNode.setAttribute("style", "display:none;");
    }
}
  </script>
