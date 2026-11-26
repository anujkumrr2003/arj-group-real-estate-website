
<div class="container my-4">
  <div class="row g-2 align-items-center custom-gap">
    <div class="col-12 col-md-auto">
      <a href="projects.php" class="btn btn-lg w-100 w-md-auto"
         style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color: #fff; font-family: 'Jazz LET';">
        Explore All Projects
      </a>
    </div>
    <div class="col-12 col-md">
      <div class="search-wrapper">
        <div class="position-relative" style="max-width: 800px; margin: auto;">
  <input type="text" id="projectSearch" class="form-control custom-search-input" placeholder="Search projects by name..." autocomplete="off">
  <div id="searchResults" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
</div>

        <span>
        <i class="fas fa-search search-icon" style="color:#fff; font-size: 1.25rem;"></i></span>
      </div>
    </div>
  </div>
</div>


                    </div>
                    </div>
                     <!--<div id="searchResults" class="mt-3" ></div>-->
            </section>
           
             <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
document.getElementById("projectSearch").addEventListener("keyup", function () {
    let query = this.value;
    if (query.length === 0) {
        document.getElementById("searchResults").innerHTML = "";
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "search-projects.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById("searchResults").innerHTML = this.responseText;
        }
    };
    xhr.send("search=" + encodeURIComponent(query));
});
</script>