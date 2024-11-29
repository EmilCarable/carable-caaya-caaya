<form>
  <label for="searchInput">Facility Name:</label>
  <input type="text" id="searchInput" name="searchInput" onkeyup="search()">
</form>

<div id="searchResults"></div>


<script>
  function search() {
    var input = document.getElementById("searchInput").value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "adminfacilitysearch.php?query=" + input, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        document.getElementById("searchResults").innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  }
</script>