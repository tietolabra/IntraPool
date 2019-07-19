<?php require_once('libs/userData.php'); ?>
<input type="button" style="margin-left: 5%" value="Return to mainmenu" onclick="mainMenu()">
<h1 style="font-size:25px;margin-bottom:0;margin-top:0">CarPool list for <?php getCompanyName(); ?></h1>
<h2 style="text-align: center; font-size:15px">This list may display people who work for your company, but at a different location.
  Always contact the listed driver
  and check that everything is in order and that the pool can be a success.</h2>
<br>
<div id="container">
  <form method="GET">
  <button id="showMailButton" type="button" style="margin-left: 5%" value="Show emails" onclick="showMails()"></button>
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
    for (pool in data) {
      console.log(data[pool]);
    }
  });
});

function mainMenu() {
        window.location.href = '?p=userMenu';
    }

function showMails(){
    //document.getElementByClassName("email").setAttribute("style", "display:none;");
    var emailElements = document.getElementById('roundTable').getElementsByClassName('email');
    for(var i = 0, length = emailElements.length; i < length; i++) {
      emailElements[i].setAttribute("style", "display:inline;");
      emailElements[i].setAttribute("style", "display:inline;");
    }
    var loactionElements = document.getElementById('roundTable').getElementsByClassName('location');
    for(var i = 0, length = locationElements.length; i < length; i++) {
      locationElements[i].setAttribute("style", "display:inline;");
      locationElements[i].parentNode.style.display = "none";
    }
}
  </script>
