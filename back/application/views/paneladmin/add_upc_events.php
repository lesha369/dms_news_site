<section>
   <div class="row">
       <div class="col-lg-2 text-center">
           <h2 class="hr">Меню</h2>
           <div class="btn-group-vertical" role="group" aria-label="Button group with nested dropdown" style="width: 100%">
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_upc_event" class="btn btn-secondary active">Добавить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_upc_event" class="btn btn-secondary">Удалить мероприятие</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_album" class="btn btn-secondary">Добавить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/del_album" class="btn btn-secondary">Удалить фотоальбом</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_photos_album" class="btn btn-secondary">Добавить/Удалить фото</a>
               <a href="<?=WEB_SERVER?>/panel_admin_dms/add_del_carousel" class="btn btn-secondary">Добавить/Удалить фото карусели</a>
           </div>
       </div>
       <div class="col-lg-8">
           <h2>Добавить последнее мероприятие</h2>
           <?php echo $message; ?>
           <?php echo validation_errors(); ?>
           <?php echo form_open_multipart('panel_admin_dms/add_upc_event');?>
               <div class="form-group">
                   <label for="exampleInputShortName">Короткое название</label>
                   <input type="text" class="form-control" id="exampleInputShortName" aria-describedby="Короткое" placeholder="Короткое название" name="short_name" value="<?php echo set_value('short_name'); ?>">
                   <small id="emailHelp" class="form-text text-muted">Обязательно для заполнения.</small>
               </div>
               <div class="form-group">
                   <label for="exampleInputFullName">Полное название</label>
                   <textarea class="form-control" id="exampleInputFullName" placeholder="Полное название" name="full_name"><?php echo set_value('full_name'); ?></textarea>
                   <small id="emailHelp" class="form-text text-muted">Обязательно для заполнения.</small>
               </div>
               <div class="form-group">
                   <label for="exampleInputTexts">Текст</label>
                   <textarea class="form-control" id="exampleInputTexts" placeholder="Весь текст описания мероприятия" rows="10" name="text"><?php echo set_value('text'); ?></textarea>
                   <small id="emailHelp" class="form-text text-muted">Обязательно для заполнения.</small>
               </div>
               <div class="form-group">
                   <label for="exampleInputPeriod">Период мероприятия</label>
                   <input type="text" class="form-control" id="exampleInputPeriod" placeholder="с 1 января 2018 по 3 марта 2018" name="period" value="<?php echo set_value('period'); ?>">
                   <small id="emailHelp" class="form-text text-muted">Обязательно для заполнения.</small>
               </div>
               <div class="form-group">
                   <label for="exampleInputImg">Картинка</label>
                   <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
                   <small id="emailHelp" class="form-text text-muted">Обязательно для заполнения.</small>
               </div>
               <button type="submit" class="btn btn-primary" name="add_upc_event">Добавить мероприятие</button>
           </form>
       </div>
       <div class="col-lg-2"></div>
   </div>

</section>
<script>
    ClassicEditor
        .create( document.querySelector( '#exampleInputTexts' ) )
        .catch( error => {
            console.error( error );
        }
        );



</script>