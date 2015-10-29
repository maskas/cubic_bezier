<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="cyborg.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="row">
    <div class="col-xs-12">
        <h1>Exchange rate margin</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-4">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Max margin</label>
                <input class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Min margin</label>
                <input class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Left easing</label>
                <input class="form-control"  type="number">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Right easing</label>
                <input class="form-control"  type="number">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-xs-1">

    </div>
    <div class="col-xs-7">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
</div>


</body>
</html>


