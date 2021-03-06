<?php
/**
 * @file
 * Template file to style output.
 */


$collection_pids = array();
foreach ($parent_collections as $collection) {
    $collection_pids[] = $collection->id;
}

?>
<?php if (isset($viewer)): ?>
  <div id="book-viewer">
    <?php print $viewer; ?>
  </div>
<?php endif; ?>
<!-- @todo Add table of metadata values -->
<?php if (!is_null($matomo_enabled) && $matomo_enabled == 1): ?>
    <script type="text/javascript">
        <!--
        var _paq = window._paq || [];
        <?php foreach ($collection_pids as $collection): ?>
        _paq.push(['trackContentImpression', '<?php print $collection; ?>', 'Part of Collection', '<?php print $_SERVER['REQUEST_URI']?>']);
        <?php endforeach; ?>
        _paq.push(['trackContentImpression', 'Book', 'Display Type', '<?php print $_SERVER['REQUEST_URI']?>']);
        //-->
    </script>
<?php endif;
if (!is_null($goog_enabled) && $goog_enabled == 1): ?>
<script type="text/javascript">
<!--
  var _gaq = _gaq || [];
  _gaq.push(['_setCustomVar', 1, 'PID', '<?php print $islandora_object->id;?>', 3]);
  _gaq.push(['_setCustomVar', 3, 'Title', '<?php print addcslashes($islandora_object->label, "'\\");?>', 3]);
<?php foreach ($collection_pids as $cpid){ ?>
  _gaq.push(['_setCustomVar', 2, 'Collection', '<?php print $cpid;?>', 3]);
<?php } ?>
//-->
</script>
<?php endif; ?>
