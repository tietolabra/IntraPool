<?php require_once('libs/userData.php'); ?>
<button value="Return to mainmenu" onclick="mainMenu()">
<h1 style="font-size:25px;margin-bottom:0;margin-top:0">CarPool list for <?php getCompanyName(); ?></h1>
<h2 style="text-align: center; font-size:15px">This list may display people who work for your company, but at a different location.
  Always contact the listed driver
  and check that everything is in order and that the pool can be a success.</h2>
<br>
<div id="container">
  <form method="GET">
    <table id="roundTable">
      <tr>
        <th>Driver name</th>
        <th>Contact information</th>
        <th>Location</th>
      </tr>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td>Mexico</td>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td>Mexico</td>
      </tr>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td>Mexico</td>
      </tr>
      <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td>Mexico</td>
      </tr>
      </tr>
    </table>
  </form>

</div>

<script>
$(() => {
  $.getJSON('action.php?a=getCompanyPools', (data) => {
    $.each(data, (k, v) => {
      console.log(k+":"+v);
    })
  });
});

function mainMenu() {
        window.location.href = '?p=userMenu';
    }

  </script>
