<!-- NAVBAR -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <span style="text-shadow: 2px 2px 5px blue; color:white">
          BRORS
        </span>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Admin Homepage</a></li>

        <li>
        <div class="btn-group" style="margin-top: 8px;">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Report <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">

            <li>
            <a href="#" data-toggle="modal" data-target="#myModal">Reservation Report</a>
            </li>

            <li>
            <a href="#" data-toggle="modal" data-target="#myModalFacility">Facility Report</a>
            </li>

          </ul>
        </div>
        </li>

       

      </ul>


      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- NAVBAR -->