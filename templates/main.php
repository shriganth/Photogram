<?php include_once '/var/labsstorage/home/shriganth87/htdocs/photogram/libs/load.php'; ?>

<main id="main" role="main">
        <section class="jumbotron text-center" id="mainBanner">

            <?php load_template('upload'); ?>
        
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="collection-heading">
                        <span>My Collection</span>
                    </div>
                </div>

                <div class="row">

                    <?php load_template('gallery'); ?>

                </div>
            </div>
        </div>
        <a href="#" class="btn btn-primary scrollUp">
            <i class="fa fa-arrow-circle-o-up"></i>
        </a>
    </main>