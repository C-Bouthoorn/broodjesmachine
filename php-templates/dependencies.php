<?php function dependencies_js() { ?>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

  <!-- Bootstrap -->
  <script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Bootstrap Select -->
  <script async src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>

  <!-- Custom scripts -->
  <script async src="/broodjesmachine/assets/js/navigation.js"></script>
<?php }

function dependencies_css() { ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap Theme -->
  <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">

  <!-- Bootstrap Select -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">

  <!-- Raleway font (Yes, I need all these sizes XD) -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

  <!-- Custom styles -->
  <link rel="stylesheet" href="/broodjesmachine/assets/css/style.css">
<?php }

function dependencies() {
  dependencies_js();
  dependencies_css();
}
