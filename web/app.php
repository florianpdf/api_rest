<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="" />
    <title>Sample</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- AngularJS -->
    <script src="js/libs/angular.min.js"></script>
    <script src="js/libs/angular-route.min.js"></script>
    <script src="js/controllers/mainController.js"></script>
    <script src="js/services/userService.js"></script>
    
    <script src="js/app.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-border" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="#/"><img src="https://unhosted.org/slides/img/js.png" width="50px"></a>
            </div>
            <ul class="nav navbar-nav">
                <li ng-class="{active: activetab=='/'}"><a href="#/">Home</a></li>
                <li ng-class="{active: activetab=='/about'}"><a href="#/about">About</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <ng-view></ng-view>
    </div>
</body>
</html>
