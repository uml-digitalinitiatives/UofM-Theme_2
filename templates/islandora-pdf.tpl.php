<?php

/**
 * @file
 * This is the template file for the pdf object
 *
 * @TODO: Add documentation about this file and the available variables
 * @TODO: don't call drupal_set_title here
 */
 
 $collection_pids = array(); // To hold parent collection pids for Google Analytics
?>

<div class="islandora-pdf-object islandora">
  <div class="print-link"><?php print t('This is a PDF document. Click on image to view.'); ?></div>
  <div class="islandora-pdf-content-wrapper clearfix">
    <?php if (isset($islandora_content)): ?>
      <div class="islandora-pdf-content">
        <?php print $islandora_content; ?>
      </div>
    <?php endif; ?>
  <div class="islandora-pdf-sidebar">
    <?php if($parent_collections): ?>
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
<script type="text/javascript">
<!--
  var _gaq = _gaq || [];
  _gaq.push(['_setCustomVar', 1, 'PID', '<?php print $object->id;?>', 3]);
  _gaq.push(['_setCustomVar', 2, 'Collection', '<?php print implode($collection_pids,'|');?>', 3]);
  _gaq.push(['_setCustomVar', 3, 'Title', '<?php print $islandora_object_label;?>', 3]);
  ga('set', 'dimension1', '<?php print $object->id;?>');
  <?php foreach($collection_pids as $cpid){?>
    ga('set', 'dimension2', '<?php print $cpid;?>');
  <?php } ?>
  ga('set', 'dimension3', '<?php print $islandora_object_label;?>');
//-->
</script>
