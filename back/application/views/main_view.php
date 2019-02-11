<section>
    <div class="container">
        <h3 class="text-center">Мы ценим своих клиентов, поэтому нам доверяют лучшие!</h3><br>
        <div class="row">
            <!--copy paste-->
            <script type="text/javascript">
                document.ondragstart = noselect;
                // запрет на перетаскивание
                document.onselectstart = noselect;
                // запрет на выделение элементов страницы
                document.oncontextmenu = noselect;
                // запрет на выведение контекстного меню
                function noselect() {return false;}
            </script>
            <!--copy paste-->
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide text-center" data-ride="carousel">
                    <ol class="carousel-indicators">

                        <?
                        $ii = 0;
                        $active = 'active';
                        foreach ($carousel_photos as $row){
                            if ($ii > 0){
                                $active = '';
                            }
                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$ii.'" class="'.$active.'"></li>';
                            $ii++;
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?
                        $i = 0;
                        $active = 'active';
                        foreach ($carousel_photos as $row){
                            if ($i > 0){
                                $active = '';
                            }

                            echo '<div class="carousel-item '.$active.'" style="height: 600px; width: auto;">
                            <img class="d-block w-100" src="'.WEB_SERVER.'/images/carousel/'.$row['foto'].'"  alt="'.$row['text_info'].'">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>'.$row['text_info'].'</h5>
                                <p>'.$row['abouth_info'].'</p>
                            </div>
                        </div>';
                            $i++;
                        }
                        ?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Предыдущее</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Следующее</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="hr"></div>
    </div>
</section>

<section>
    <div class="container">
        <h3>Ближайшие Мероприятия:</h3>
        <?
        $n = 1;
        $nn = 1;
        $count_upc_ev = count($upc_events);
        $start = '';
        $end = '';
        $add = '';

        foreach ($upc_events as $roww){

            if ($n == 1){
                $start = '<div class="card-deck">';
                //$start = 'open ';
            }
            else {
                $start = '';
            }
            if ($n == 3){
                $end = '</div>';
                //$end = 'close';
                $n = 0;
            }
            else{
                $end = '';
            }
            if ($nn == $count_upc_ev){
                $end = '</div>';


                switch ($n){
                    case 1:
                        $add = '<div class="col-lg-8"></div>';
                        break;

                    case 2:
                        $add = '<div class="col-lg-4"></div>';
                        break;
                }
            }


            echo $start;
            echo '<div class="card">
                <img class="card-img-top" src="'.WEB_SERVER.'/images/upc_events/'.$roww['foto'].'" alt="">
                <div class="card-body">
                    <h4 class="card-title">'.$roww['short_name'].'</h4>
                    <p class="card-text">'.$roww['full_name'].'</p>
                    <p class="card-text"><a href="'.WEB_SERVER.'/main/upc_event/'.$roww['id'].'" class="btn btn-outline-info">Подробнее</a></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">'.$roww['date_event'].'</small>
                </div>
            </div>';
            echo $add;
            echo $end;
            $n++;
            $nn++;
        }
        ?>


    </div>

</section>