<?php require_once('libs/userData.php'); ?>
<input type="button" style="margin-left: 5%" value="Return to mainmenu" onclick="mainMenu()">
<h1 style="font-size:25px;margin-bottom:0;margin-top:0">CarPool list for <?php getCompanyName(); ?></h1>
<h2 style="text-align: center; font-size:15px">This list may display people who work for your company, but at a different location.
  Always contact the listed driver
  and check that everything is in order and that the pool can be a success.</h2>
<br>
<div id="container">
  <form method="GET">
  <input id="showMailButton" type="button" style="margin-left: 5%" value="Show emails" onclick="showMails()">
    <table id="roundTable">
      <tr>
        <th>Driver name</th>
        <th class="email">Email</th>
        <th>Location</th>
      </tr>
      <tr>
        <td>Erkki Esimerkki</td>
        <td class="email" >Erkki.Esimerkki@hamk.fi</td>
        <td class="location">Riihimäki</td>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td class="email">Francisco Chang</td>
        <td class="location">Mexico</td>
      </tr>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td class="email">Francisco Chang</td>
        <td class="location">Mexico</td>
      </tr>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td class="email">Francisco Chang</td>
        <td class="location">Mexico</td>
      </tr>
      </tr>
    </table>
  </form>

</div>

<script>
$(() => {
  $.getJSON('action.php?a=getCompanyPools', (data) => {
    for pool in data {
      console.log(pool);
    }
  });
});

function mainMenu() {
        window.location.href = '?p=userMenu';
    }

function showMails(){
    document.getElementByClassName("email").setAttribute("style", ""display:none;""");
    
}
  </script>
