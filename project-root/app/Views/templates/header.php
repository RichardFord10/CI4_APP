<!DOCTYPE html>
<html lang="en">
<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    $is_logged_in = TRUE;
} ?>

<head>
    <title><?php esc($title); ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="<?php echo base_url(); ?>/modules/admin/css/styles.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>/modules/admin/css/homestyles.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    

    <!-- CHART DATA-->
     <script src="<?php echo base_url(); ?>/modules/admin/js/datatables-simple-demo.js"></script>
    <script src="<?php echo base_url(); ?>/modules/admin/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>/modules/admin/js/homescripts.js"></script>
    <script src="<?php echo base_url(); ?>/modules/admin/js/ajax/app.js"></script>


    <!--END CHART DATA-->
    
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
</head>

<body class="sb-nav-fixed sb-sidenav">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <a class="navbar-brand ps-3" href="/dashboard">Home</a>
            
            <!-- Sidebar Toggle-->
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="/apis/index">
                                <div class="sb-nav-link-icon"><i class="fas fa-cube"></i></div>
                                API Workings
                            </a>
                            <div class="sb-sidenav-menu-heading">Database CRUD</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Blog
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/blog/">Overview</a>
                                    <a class="nav-link" href="/blog/create">Create</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseData" aria-expanded="false" aria-controls="collapseData">
                                <div class="sb-nav-link-icon"><i class="fa fa-sitemap"></i></i></div>
                                Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseData" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/items/">Item Overview</a>
                                    <a class="nav-link" href="/sales/">Sales Overview</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login">Login</a>
                                            <a class="nav-link" href="register">Register</a>
                                            <a class="nav-link" href="password">Forgot Password</a>
                                        </nav>
                                    </div>
                                   
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionLocations">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#LocationsCollapseAuth" aria-expanded="false" aria-controls="LocationsCollapseAuth">
                                        Locations
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="LocationsCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="/locations">Overview</a>
                                        </nav>
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="/locations/create">Create Location</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401">401 Page</a>
                                            <a class="nav-link" href="404">404 Page</a>
                                            <a class="nav-link" href="500">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Data Visualization</div>
                            <a class="nav-link" href="/charts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="/tables">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <strong><?php echo ($is_logged_in = TRUE ? session('user_name') : 'Guest'); ?></strong></div>
                    </div>
                </nav>
            </div>
        </div>
<hr>
        <div class="alerts container-fluid">
        <?php
        if (session()->getFlashData('success')) {
            echo('<div class="alert alert-success" style="margin-bottom:0;"> ' . (session()->getFlashData('success')) . '</div>');
            unset($_SESSION['success']);
        }
        else if (session()->getFlashData('error')) {
            echo('<div class="alert alert-danger" style="margin-bottom:0;"> ' . (session()->getFlashData('error')) . ' </div>');
            unset($_SESSION['error']);
        }
        else if (session()->getFlashData('fail')) {
            echo('<div class="alert alert-warning"> ' . (session()->getFlashData('fail')) . ' </div>');
            unset($_SESSION['fail']);
        }
        else if (session()->getFlashData('message')) {
            echo('<div class="alert alert-warning"> ' . (session()->getFlashData('message')) . ' </div>');
            unset($_SESSION['message']);
        }
        // else if (!isset($data->msg)) {
        //     echo('<div class="alert alert-success"> ' . print_r($data) . ' </div>');
        // } ?>
        </div>
        

