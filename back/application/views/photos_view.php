<section>
    <div class="container">
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
        if (isset($photos[0]['info_album']) and !empty($photos[0]['info_album'])){
            echo '<h3 class="text-center">
'.$photos[0]['album_name'].'</h3>';
        }
        else{
            echo '<h3 class="text-center">Фотоальбома не существует</h3>';
        }
        if (isset($photos[0]['info_album']) and !empty($photos[0]['info_album'])){
            echo '<p><b>Инфо: </b>'.$photos[0]['info_album'].'</p>';
        }
        if (isset($photos[0]['date_album']) and !empty($photos[0]['date_album'])){
            echo '<p><b>Дата: </b>'.$photos[0]['date_album'].'</p>';
        }
        ?>
        <div class="row">
            <?
            foreach ($photos as $row){
                echo '<div class="col-lg-3 col-md-4 col-6 thumb">
            <a data-fancybox="gallery" href="'.WEB_SERVER.'/images/gallery/'.$row['folder_album'].'/'.$row['photo'].'">
                <img class="img-fluid" src="'.WEB_SERVER.'/images/gallery/'.$row['folder_album'].'/'.$row['photo'].'" alt="'.$row['name_photo'].'" title="'.$row['name_photo'].'">
            </a>
            <p class="text-center"><small>'.$row['name_photo'].'</small></p>
        </div>';
            }

            ?>
        </div>
    </div>

</section>