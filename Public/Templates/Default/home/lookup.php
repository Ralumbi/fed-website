<div class="container">
    <h3>Lookup PlayerData</h3>
</div>



<?php
// https://gameinfo.albiononline.com/api/gameinfo/search?q=Jeadyn

// $url = 'https://gameinfo.albiononline.com/api/gameinfo/search?q=Jeadyn';; 
// $content = file_get_contents($url); 
// $json = json_decode($content, JSON_FORCE_OBJECT);

// echo "<p>Guild name: {$json['players'][0]['GuildName']}</p>";
// echo "<p>Alliance name: {$json['players'][0]['AllianceName']}</p>";
// echo "<p>Player: {$json['players'][0]['Name']}</p>";
// echo "<p>FameRatio: {$json['players'][0]['FameRatio']}</p>";

//FED https://gameinfo.albiononline.com/api/gameinfo/guilds/uhmotNBAQ6-0vi9PFysRBg/members
//CG  https://gameinfo.albiononline.com/api/gameinfo/guilds/DWkD4B0uSsGQoryrz8Nuwg/members
//RDN https://gameinfo.albiononline.com/api/gameinfo/guilds/wSbCgimqTPy470n-wDQXPQ/members
//MO  https://gameinfo.albiononline.com/api/gameinfo/guilds/nmc0HQW-TZirTlnGzwbF-w/members  
//BKO https://gameinfo.albiononline.com/api/gameinfo/guilds/WpV4yaVxSLW8QXH2Be40cA/members

$raid_roles = ['Main Tank', 'Off Tank', 'Main Healer', 'Party Healer', 'Great Arcane', '1H Arcane', 'Ironroot 1', 'Ironroot 2', 'Ironroot 3', 'Shadowcaller', 'Realmbreaker', 'Spirithunter', 'Specter', 'Blazing', 'Carving', 'DPS 1', 'DPS 2', 'DPS 3', 'DPS 4', 'DPS 5', 'SCOUT'];
$raid_tiers = ['T6', 'T6.1', 'T6.2', 'T6.3', 'T7', 'T7.1', 'T7.2', 'T7.3', 'T8', 'T8.1', 'T8.2', 'T8.3'];

// $alliance_guilds = [];

// $url_alliance_guilds = 'https://gameinfo.albiononline.com/api/gameinfo/alliances/x9Ds2xhcR36fOexrVJHSbQ';
// $content_alliance_guilds = file_get_contents($url_alliance_guilds);
// $json_alliance_guilds = json_decode($content_alliance_guilds, true);

// foreach ($json_alliance_guilds as $guild_id) {

//     echo $guild_id['Id'];
// }

// var_dump($json_alliance_guilds);

// $url1 = 'https://gameinfo.albiononline.com/api/gameinfo/guilds/uhmotNBAQ6-0vi9PFysRBg/members';
// $url2 = 'https://gameinfo.albiononline.com/api/gameinfo/guilds/DWkD4B0uSsGQoryrz8Nuwg/members';
// $url3 = 'https://gameinfo.albiononline.com/api/gameinfo/guilds/wSbCgimqTPy470n-wDQXPQ/members';
// $url4 = 'https://gameinfo.albiononline.com/api/gameinfo/guilds/nmc0HQW-TZirTlnGzwbF-w/members';
// $url5 = 'https://gameinfo.albiononline.com/api/gameinfo/guilds/WpV4yaVxSLW8QXH2Be40cA/members'; 


$url = 'https://gameinfo.albiononline.com/api/gameinfo/guilds/uhmotNBAQ6-0vi9PFysRBg/members';
$content = file_get_contents($url);
$json = json_decode($content, true);

?>

<div class="container">

<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-12">
    <div class="col-md-2 position-relative">
      Raid Tier
      <select class="form-select">
      <option value="">Choose raid tier</option>
      <?php for ($i=0; $i < 1; $i++) { 
       foreach ($raid_tiers as $raid) {
        
        ?>
        <option value="<?=$i?>"><?=$raid?></option>
      <?php }} ?>
      </select>
    </div>
  </div>

  <?php foreach ($raid_roles as $role): ?>
  <div class="col-md-4">
    <div class="col-md-6 position-relative">
      <?= $role ?>
      <select class="form-select" id="validationTooltip04" required>
        <option value="">Choose player</option>
      <?php foreach ($json as $query) {
              echo '<option value="">['.$query['GuildName'].'] '.$query['Name'].'</option>';
      } ?>

      </select>
    </div>
  </div>
  <?php endforeach; ?>

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>

<br>





<select class="form-select form-select-sm" aria-label=".form-select-sm example">
  <option selected>Open this select menu</option>
  
<?php
  foreach ($json as $query) {
    echo '<option value="">'.$query['Name'].'</option>';
  }

  ?>


  <!-- <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option> -->
</select>

<br>

<table class="table table-dark table-striped">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">GuildName</th>
      <th scope="col">AllianceName</th>
    </tr>
  </thead>
  <tbody>


  


<?php

foreach ($json as $query) {

  echo '
  
  
    <tr>
      <th scope="row">'. $query['Id'] .'</th>
      <td>'.$query['Name'].'</td>
      <td>'.$query['GuildName'].'</td>
      <td>'.$query['AllianceName'].'</td>
    </tr>
  
  
  ';
  // echo "Json object:";
  // echo "<br>";
  // echo "ID: " . $query['Id'];
  // echo "<br>";
  // echo "NAME: " . $query['Name'];
}
?>
</tbody>
</table> 








</div>