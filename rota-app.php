<?php
include_once('src/php/includes.php');
?>


<?php
include_once('src/php/html_head.php');
?>

	<div class='container'>


<div class="tab">
  <button class="tablinks" onclick="openTab(event, 'London')">London</button>
  <button class="tablinks" onclick="openTab(event, 'Paris')">Paris</button>
  <button class="tablinks" onclick="openTab(event, 'Tokyo')">Tokyo</button>
</div>

<div id="London" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>


	</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
include_once('src/php/html_foot.php');
?>