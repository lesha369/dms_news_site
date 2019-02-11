<section>
    <div class="container">
        <?php echo validation_errors(); ?>
        <h2 class="hr text-center"><?=$data['short_name'];?></h2>
        <h3><?=$data['full_name'];?></h3>
        <div class="text-center img-news" ><img src="<?=WEB_SERVER;?>/images/upc_events/<?=$data['foto'];?>" width="100%" height="auto" ></div>
        <p><?=$data['text_info']?></p>
        <p><?=$data['date_event']?></p>
        <div class="hr"></div>
    </div>

</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h2 class="text-center">Оставить заявку</h2>
                <script src="<?=WEB_SERVER;?>/js/bootstrap-formhelpers-phone.js"></script>
                <?php echo form_open('main/upc_event/'.$id); ?>
                <div class="form-group">
                    <label for="exampleInputFio">ФИО</label>
                    <input type="text" class="form-control" name="fio" value="<?php echo set_value('fio'); ?>" id="exampleInputFio" aria-describedby="ФИО" placeholder="Иванов Иван Иванович">
                    <small id="ФИО" class="form-text text-muted">Обязательно для ввода.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputCompany">Название компании</label>
                    <input type="text" class="form-control" name="company" value="<?php echo set_value('company'); ?>" id="exampleInputCompany" aria-describedby="Название компании" placeholder="Компания">
                    <small id="Название компании" class="form-text text-muted">Не обязательно для ввода.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone">Телефон</label>
                    <input type="text" class="form-control bfh-phone" name="phone" value="<?php echo set_value('phone'); ?>" data-format="+7 (ddd) ddd-dddd"  id="exampleInputPhone" aria-describedby="Phone" >
                    <small id="Phone" class="form-text text-muted">Обязательно для ввода.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email - адрес</label>
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ivanov@company.com">
                    <small id="emailHelp" class="form-text text-muted">Обязательно для ввода.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Примечание</label>
                    <textarea class="form-control" name="other" id="exampleInputText" placeholder="Примечание" rows="5"><?php echo set_value('other'); ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit" class="btn btn-outline-primary">Отправить</button>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>