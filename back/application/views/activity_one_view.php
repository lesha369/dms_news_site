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
        <h2><?=$activity['name']?></h2>
        <p><?=$activity['text']?></p>


    </div>

</section>