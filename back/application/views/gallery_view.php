<section>
    <div class="container">
        <h2 class="text-center">Фотогалерея</h2><br>
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
            foreach ($albums as $row){
                echo '<div class="col-lg-3 col-md-4 col-6">
                        <a href="'.WEB_SERVER.'/main/gallery/'.$row['id'].'">
                            <div class="p-gallery text-center">'.$row['name'].'</div>
                            <img class="img-fluid" src="'.WEB_SERVER.'/images/gallery/'.$row['folder_album'].'/'.$row['logo'].'" alt="'.$row['name'].'" title="'.$row['info_album'].'" style="height: 200px; width: 100%;"> 
                        </a><br>
                        <!--small><b>Инфо: </b>'.$row['info_album'].'</small><br-->
                        <small><b>Дата: </b>'.$row['date_album'].'</small>
                    </div>';
            }
            ?>
        </div>
    </div>

</section>