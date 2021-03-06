<?php

/**
 * @file
 * This is the template file for the object page for audio file
 *
 * @TODO: add documentation about file and available variables
*  @TODO: drupal_set_title shouldn't be called here
 */
 $collection_pids = array(); // To hold parent collection pids for Google Analytics
?>

<div class="islandora-audio-object islandora">
  <?php print l(t("Printer Friendly Version"), "islandora/object/{$islandora_object->id}/print_object", array('attributes'=>array('class'=>array('print-link')))); ?>
  <div class="islandora-audio-content-wrapper clearfix">
    <?php if (isset($islandora_content)): ?>
      <div class="islandora-audio-content">
        <?php print $islandora_content; ?>
      </div>
    <?php endif; ?>
  <div class="islandora-audio-sidebar">
    <?php if ($parent_collections): ?>
      <div>
        <h2><?php print t('In collections'); ?></h2>
        <ul>
          <?php foreach ($parent_collections as $collection): ?>
            <li><?php print l($collection->label, "islandora/object/{$collection->id}"); ?></li>
             <?php $collection_pids[] = $collection->id; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>
  </div>
</div>
<?php
  if (!is_null($matomo_enabled) && $matomo_enabled == 1): ?>
<script type="text/javascript">
<!--
  var _paq = window._paq || [];
<?php foreach ($collection_pids as $collection): ?>
  _paq.push(['trackContentImpression', '<?php print $collection; ?>', 'Part of Collection', '<?php print $_SERVER['REQUEST_URI']?>']);
<?php endforeach; ?>
  _paq.push(['trackContentImpression', 'Audio', 'Display Type', '<?php print $_SERVER['REQUEST_URI']?>']);
//-->
</script>
<?php endif;
  if (!is_null($goog_enabled) && $goog_enabled == 1): ?>
<script type="text/javascript">
<!--
  ga('set', 'cd1', '<?php print $islandora_object->id;?>');
  ga('set', 'cd2', '<?php print implode('|', $collection_pids);?>');
  ga('set', 'cd3', '<?php print addcslashes($islandora_object->label, "\'\\\\");?>');
  var _gaq = _gaq || [];
  _gaq.push(['_setCustomVar', 1, 'PID', '<?php print $islandora_object->id;?>', 3]);
<?php foreach ($collection_pids as $cpid){ ?>
  _gaq.push(['_setCustomVar', 2, 'Collection', '<?php print $cpid;?>', 3]);
<?php } ?>
  _gaq.push(['_setCustomVar', 3, 'Title', '<?php print addcslashes($islandora_object_label, "'\\");?>', 3]);
//-->
</script>
<?php endif; ?>

