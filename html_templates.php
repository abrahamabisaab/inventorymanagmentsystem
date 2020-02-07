<?php
include('functions.php');
include('connection.php');
function start_page_side_bar(){
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Main Page</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/addItems.css">
    <link rel="stylesheet" href="css/addClient.css">
    <link rel="stylesheet" href="css/addSupplier.css">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/balance.css">
    <link rel="stylesheet" href="css/html_templates.css">
    <link rel="stylesheet" type="text/css" href="css/accountdetails.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="DataTables/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
      });
    });
     // if(window.location.href=="http://localhost:8080/pos/suppliers.php"){
     // document.getElementById('suppliers_dropdown').removeAttribute("onclick");
     // }
    // else{
       // window.location.href="suppliers.php";
        // console.log(window.location.href);
        // }

  </script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h2>Jandali Co.</h2>
            </div>
            <ul class="list-unstyled components">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li ><a href="suppliers.php" >Supplier</a></li>
                <li ><a href="clients.php" >Clients</a></li>
                <li ><a href="items.php" >Items</a></li>
                <li ><a href="sell_purchase.php" >Sell / Purchase</a></li>
                <li ><a href="balance.php" >Balance</a></li>
                <li ><a href="inventory.php" >Invetory</a></li>
            </ul>
        </nav>
        <!-- Page Content Holder -->
          <div id="content">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" class="navelements">Sell Cart</a></li>
                            <li><a href="#" class="navelements">Purchase Cart</a></li>
                            <li><a href="accountdetails.php"  class="navelements">Account Details</a></li>
                            <li><a href="#"  class="navelements">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
              <!-- nav ends / view start -->
          <?php
        }
function end_page_side_bar(){
        ?>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>
<?php function add_items_html(){
    start_page_side_bar();
     ?>
<table id="data" class="compact table table-striped"  style="width:100%;">
</table>
<script type="text/javascript">
get_table();
function get_table(){
var table=document.getElementById("data");
var xhttp = new XMLHttpRequest();
xhttp.open("GET", "get_items.php", true);
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        table.innerHTML=this.responseText;
        fill_table();
    }
};
xhttp.send();
}
function delete_items(id){
        console.log(id)
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "delete_items.php?id="+id, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText=="success"){
                    row.style.display= "none";
                }
            }
        };
        xhttp.send();
    }

    function get_edit_row_items(id){
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "get_edit_row_items.php?id="+id, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            row.innerHTML=this.responseText;
            console.log(this.responseText);
            }
        };
        xhttp.send();
    }


    function save_edit_item(id){
        var itemcode =document.getElementById(id+"_item_code").value;
        var name =document.getElementById(id+"_name").value;
        var buying_price =document.getElementById(id+"_buying_price").value;
        var selling_price =document.getElementById(id+"_selling_price").value;
        var size =document.getElementById(id+"_size").value;
        var diameter =document.getElementById(id+"_diameter").value;
        var brand =document.getElementById(id+"_brand").value;
        var material =document.getElementById(id+"_material_discount").value;
        var description =document.getElementById(id+"_description").value;
        var country_of_origin =document.getElementById(id+"_country_of_origin").value;
        var stock =document.getElementById(id+"_stock").value;
        var ministry_code =document.getElementById(id+"_ministry_code").value;
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "save_edit_item.php?id="+
            id+"&itemcode"+itemcode+"&name"+name+"&buying_price"+
            buying_price+"&selling_price"+selling_price+
            "&size"+size+"&diameter"+diameter+"&brand"+brand+
            "&material"+material+"&description"+description+"&country_of_origin"+
            country_of_origin+"&stock"+stock+"&ministry_code"+
            ministry_code+"&row="+row, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                row.innerHTML=this.responseText;
            }
        };
        xhttp.send();
    }



function fill_table() {
$('#data').DataTable();
}
</script>

<?php
end_page_side_bar();
}?>

<?php
function add_clients_html(){
    start_page_side_bar();
     ?>

    <table id="data" class="compact table table-striped" style="width:100%;">
    </table>
    <script type="text/javascript">
    get_table();
    function get_table(){
    var table=document.getElementById("data");
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "get_client.php", true);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            table.innerHTML=this.responseText;
            fill_table();
        }
    };
    xhttp.send();
    // new functions needs to be defined and edited
}
function delete_clients(id){
        console.log(id)
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "delete_clients.php?id="+id, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText=="success"){
                    row.style.display= "none";
                }
            }
        };
        xhttp.send();
    }

    function get_edit_row_clients(id){
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "get_edit_row_clinets.php?id="+id, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                row.innerHTML=this.responseText;
            }
        };
        xhttp.send();
    }

    function save_edit_client(id){
        var name =document.getElementById(id+"_name").value;
        var phone_number =document.getElementById(id+"_phone_number").value;
        var address =document.getElementById(id+"_address").value;
        var mof =document.getElementById(id+"_mof").value;
        // console.log(discount);
        var balance_usd =document.getElementById(id+"_balance_usd").value;
        var balance_lbp =document.getElementById(id+"_balance_lbp").value;
        var discount =document.getElementById(id+"_discount").value;
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "save_edit_client.php?name="+name+"&id="+id+"&phone_number="+phone_number+"&discount="+discount+"&address="+address+"&mof="+mof+"&balance_lbp="+balance_lbp+"&balance_usd="+balance_usd+"&row="+row, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                row.innerHTML=this.responseText;
            }
        };
        xhttp.send();
    }




function fill_table() {
    $('#data').DataTable();
}





</script>
<?php
end_page_side_bar();
}?>

<?php function add_suppliers_html(){
start_page_side_bar();
    ?>
    <table id="data" class="compact table table-striped" style="width:100%;">
</table>
<script type="text/javascript">
    get_table();

    function get_table(){
        var table=document.getElementById("data");
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "get_suppliers.php", true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                table.innerHTML=this.responseText;
                fill_table();
            }
        };
        xhttp.send();
    }

    function delete_suppliers(id){
        console.log(id)
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "delete_suppliers.php?id="+id, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText=="success"){
                    row.style.display= "none";
                }
            }
        };
        xhttp.send();
    }

    function get_edit_row_suppliers(id){
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "get_edit_row_suppliers.php?id="+id, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                row.innerHTML=this.responseText;
            }
        };
        xhttp.send();
    }


    function save_edit_supplier(id){
        var title =document.getElementById(id+"_title").value;
        var location =document.getElementById(id+"_location").value;
        var phone =document.getElementById(id+"_phone").value;
        var email =document.getElementById(id+"_email").value;
        var balance_lbp =document.getElementById(id+"_balance_lbp").value;
        var balance_usd =document.getElementById(id+"_balance_usd").value;
        var row=document.getElementById(id);
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "save_edit_supplier.php?title="+title+"&id="+id+"&location="+location+"&phone="+phone+"&email="+email+"&balance_lbp="+balance_lbp+"&balance_usd="+balance_usd+"&row="+row, true);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                row.innerHTML=this.responseText;
            }
        };
        xhttp.send();
    }

    function fill_table() {
        $('#data').DataTable();
    }
</script>
<?php
end_page_side_bar();
}
 function sell_purchase_items(){
    start_page_side_bar();
     ?>
<table id="data" class="compact table table-striped" style="width:100%;">
</table>
<script type="text/javascript">
get_table();
function get_table(){
var table=document.getElementById("data");
var xhttp = new XMLHttpRequest();
xhttp.open("GET", "get_sell_purchase.php", true);
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        table.innerHTML=this.responseText;
        fill_table();
    }
};
xhttp.send();
}

function fill_table() {
$('#data').DataTable();
}
</script>

<?php
end_page_side_bar();
}?>
