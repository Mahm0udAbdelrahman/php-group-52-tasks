    <?php
    include("./layout/Header.php");
    ?>
    <?php
    $cards = ["card1", "card2", "card3", "card4", "card5", "card6"];
    ?>
    <div class="container ">
        <div class="row  ">
            <?php foreach ($cards as $card) : ?>
                <div class="card col-4 col-lg-6 col-m-12 ms-5 mb-5" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php

    include("./layout/Footer.php");


    ?>