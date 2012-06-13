<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.keepalive') ?>
<?= @helper('behavior.validator') ?>

<script>
    window.addEvent('domready', (function(){
        var holder = document.id('calendar-event-form');
        holder.getElement('a.cancel').addEvent('click', function(event) {
            event.stop();
            
            holder.getElement('input[name=action]').set('value', 'cancel');
            holder.getElement('form.-koowa-form').submit();
        });
    }));
</script>

<div id="calendar-event-form">
	<div class="event event-form">
		<form action="" method="post" class="-koowa-form" enctype="multipart/form-data">
            <input type="hidden" name="action" value="save" />
            
            <div style="padding: 20px;">

			   	<input type="text" name="title" class="required" value="<?= @escape($event->title) ?>" placeholder="<?= @text('Title') ?>" />
			   	
			   	<div class="input-prepend input-append">
			   	<span class="add-on"><?=@text( 'From' )?></span><?= @helper('com://site/news.template.helper.behavior.calendar',
			   			array(
			   				'date' => $event->start_date,
			   				'name' => 'start_date',
			   				'format' => '%Y-%m-%d %H:%M',
			   				'attribs' => array('style' => 'width: 120px')
			   			)); ?>
			   	</div>
			
	            <?
	                $controller = @service('com://admin/editors.controller.editor');
	                $controller->getView()->setEditorSettings($editor_settings);
	                echo $controller->name('description')->data($event->description)->toggle(false)->codemirror(false)->display();
	            ?>
		    </div>
		    <div class="form-actions">
			    <input class="btn btn-primary" type="submit" value="<?= @text('Save') ?>" /> <?= @text('or') ?> <a href="#" class="cancel">Cancel</a>
		    </div>
		</form>
	</div>
</div>