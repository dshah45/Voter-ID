<!DOCTYPE html>
<html>


    <style>
      .carousel .carousel-item {
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
}

.carousel .carousel-item:first-of-type {
    background-image: url("img2.jpg");
}

.carousel .carousel-item:nth-of-type(2) {
    background-image: url("1.jpg");
}

.carousel .carousel-item:last-of-type {
    background-image: url("4.jpg");
}

.carousel-control-prev-icon, .carousel-control-next-icon {
    width: 50px;
    height: 50px;
}

    </style>
<body>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active"></div>
        <div id="target" class="carousel-item"></div>
        <div class="carousel-item"></div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</body>
</html>