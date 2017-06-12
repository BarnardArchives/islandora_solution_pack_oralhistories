<div class="row">
  <div class="col-sm-12 col-md-12">
    <div data-transcripts-role="video" data-transcripts-id="<?php print $params['trid']; ?>">
      <div align="center" id="video_container">
        <video class="video-js vjs-default-skin embed-responsive-item" controls poster="<?php print $params['tn']; ?>" preload="auto"  width="100%" height="360" data-setup="{}" id="video-js-oh">
          <source src="<?php print $params['url']; ?>" type="<?php print $params['mime']; ?>"/>
          <?php if (isset($params['tracks']) && $params['enable_transcript_display']): ?>
            <?php foreach ($params['tracks'] as $key => $track): ?>
              <?php if ($track['MEDIATRACK'] == TRUE): ?>
                  <track id="track<?php print $key; ?>" src="<?php print $track['source_url']; ?>" srclang="<?php print $track['lang_code']; ?>"
                    kind="captions" label="<?php print $track['lang_code']; ?>" <?php print $track['default']; ?>>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </video>
      </div>
    </div>
  </div>
  <?php if ($params['enable_transcript_display'] && isset($params['tracks'])): ?>
  <div id="transcript-tabs" class="col-sm-12 col-md-12">
    <ul id="tabs-list">
      <li><a href="#transcript-tab">Transcript</a></li>
      <li><a href="#annotation-tab">Annotations</a></li>
    </ul>
    <div id="transcript-tab">
      <?php if (array_key_exists('transcript_content', $params)) {
        print $params['transcript_content'];
      } else {
        print "No Content available.";
      }
      ?>
    </div>
    <div id="annotation-tab">
      <?php

      $name = 'islandora_web_annotations';
      $display_id = 'block_1';
      $view = views_get_view($name);

      if (!$view || !$view->access($display_id)) {
        return;
      }
      $view_content = $view->preview($display_id);
      print $view_content;

      ?>

    </div>
  </div>
  <?php endif; ?>
</div>

