<div class="eltd-self-hosted-video-holder">
    <div class="mobile-video-image" style="background-image: url(<?php echo esc_url($media['video_cover']); ?>);"></div>
    <div class="eltd-video-wrap">
        <video class="eltd-self-hosted-video" poster="<?php echo esc_url($media['video_cover']); ?>" preload="auto">
            <?php if(!empty($media['video_url']['webm'])) { ?>
                <source type="video/webm" src="<?php echo esc_url($media['video_url']['webm']); ?>"> <?php } ?>
            <?php if(!empty($media['video_url']['mp4'])) { ?>
                <source type="video/mp4" src="<?php echo esc_url($media['video_url']['mp4']); ?>"> <?php } ?>
            <?php if(!empty($media['video_url']['ogv'])) { ?>
                <source type="video/ogg" src="<?php echo esc_url($media['video_url']['ogv']); ?>"> <?php } ?>
            <object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>">
                <param name="movie" value="<?php echo esc_url(get_template_directory_uri().'/js/flashmediaelement.swf'); ?>"/>
                <param name="flashvars" value="controls=true&file=<?php echo esc_url($media['video_url']['mp4']); ?>"/>
                <img src="<?php echo esc_url($media['video_cover']); ?>" width="1920" height="800" title="No video playback capabilities" alt="<?php esc_html_e('video thumb','kendall'); ?>"/>
            </object>
        </video>
    </div>
</div>