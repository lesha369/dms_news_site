<section>
    <div class="container">
        <h2 class="text-center">Мероприятия</h2><br>
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
            <?
            $i=1;
            foreach ($activityes as $row) {
                echo '<div class="col-lg-4 block-act">
                <div class="box_aside">
                    <span style="font-size: 15px; color: black;">
                        <i class="'.$row['icon'].'"></i>
                    </span>
                </div>
                <div class="box_cnt__no-flow">
                    <p><a href="'.WEB_SERVER.'/main/activitys/'.$row['id'].'" class="btn btn-link">'.$row['name'].'</a></p>
                </div>
            </div>';
                $i++;
            }
            ?>

        </div>


    </div>

</section>