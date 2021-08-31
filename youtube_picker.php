<?php

// Component to display a YouTube embed, selected on button click
// Video data loaded via page ACF reperater custom field

if (have_rows('video')) :
    while (have_rows('video')) : the_row();
        // video selection buttons
        // vars
        $video_title = get_sub_field('video_title');
        $video_url = get_sub_field('video_url');
        $video_id = str_replace('https://www.youtube.com/watch?v=', '', $video_url);

?>
        <button onclick="loadNewVideo(this)" class="button video-button" data-attribute="<?php echo $video_id; ?>" value="<?php echo $video_title; ?>"><?php echo $video_title; ?></button>
    <?php endwhile;
    // video player
    // get first video on list as default
    $videos = get_field('video');
    $first_video_url = $videos[0]['video_url'];
    $first_video_id = str_replace('https://www.youtube.com/watch?v=', '', $first_video_url);
    ?>
    <div class="youtube-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $first_video_id; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
<?php endif;

?>
<script type="text/javascript">
    // loads new video using data attribute of button
    function loadNewVideo(el) {
        console.log(el.dataset.attribute);
        var embedUrl = "https://www.youtube.com/embed/" + el.dataset.attribute;
        document.querySelector('.youtube-video iframe').setAttribute('src', embedUrl);
    }
</script>