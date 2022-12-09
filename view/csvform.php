<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script> -->
    <title>Blogspot</title>

    <style>
.body{
  margin:0px;
  color:white;
  font-family: Arial;
}

.bg-custom-2 {
  background-image: linear-gradient(15deg, #71C5EE 0%, #025091 100%);
}

.header{
  margin:0px;
  background:#333;
  padding: 20px;

  display:flex;
  justify-content:space-between;
  align-items: center;
}

a{
  color: #070707;
  margin:10px;
  text-decoration: none;
  font-family: Arial, Helvetica, sans-serif;
}

.active{
  color:#04Ae8f;
}

/* -----------------------DROPDOWN-------------------------- */
.nav-item .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-menu {
  display: none;
  position: absolute;
  /* background-color: #f9f9f9; */
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-menu {
  display: block;
}

button{
position:center;
margin-top:0px;
margin-bottom: 20px;
width:100%;
background-color: #2a8ab9;
color:#e5e5e5;
border-radius: 10px;
cursor: pointer;
}

.table td, .table th {
padding: 0.75rem;
vertical-align: middle;
border-top: 1px solid #dee2e6;
}

#table-data{
padding: 15px;
min-height: 500px;
}
#table-data th{
background:#71C5EE;
color: #fff;
}
#table-data tr:nth-child(odd){
background: #ecf0f1;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-custom-2 bg-primary">
  <a class="navbar-brand" href="#">PRODUCT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="productform.php">Add Product<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="csvform.php">IMPORT CSV</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      </ul>
  </div>
<div class="pull-right">
    <ul class="nav pull-right">
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome</a>
        <ul class="dropdown-menu">
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </li>
    </ul>
</div> 
</nav>

<div id="wrap">
<div class="container mt-4">
    <div class="row">
        <form class="form-horizontal" action="/mvcpattern/controller/controller.php" method="post" name="upload_excel" enctype="multipart/form-data">
            <fieldset>
                <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-6 control-label" for="filebutton">Select File</label>
                    <div class="col-md-4">
                        <input type="file" name="file" id="file" class="input-large" accept=".csv,.xls,.xlsx" required>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-6 control-label" for="singlebutton">Import data</label>
                    <div class="col-md-4">
                        <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
            <!-- <div>
    <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"   
                enctype="multipart/form-data">
            <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>
                    </div>
            </div>                    
    </form>           
</div> -->
</div>
</div>

</body>
</html>