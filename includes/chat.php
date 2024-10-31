<?php 
    global $numberchat;
     $opt_name = 'numberchat';
?>

<div id='whatsapp-chat' class='hide'>
    <div class='header-chat'>
        <div class='head-home'>
            <h3 style="color: #fff">
                <?php if (!empty($numberchat['text-example'])) { 
                    echo esc_html($numberchat['text-example']); 
                } ?>
            </h3>
            <p>
                <?php if (!empty($numberchat['text-example-hint'])) {
                    echo esc_html($numberchat['text-example-hint']);
                } ?>
                <span>
                    <?php if (!empty($numberchat['text-exam'])) { 
                        echo esc_html($numberchat['text-exam']); 
                    } ?>
                </span>
            </p>
        </div>
        <div class='get-new hide'>
            <div id='get-label'></div>
            <div id='get-nama'></div>
        </div>
    </div>
    <div class='home-chat'>
        <!-- Info Contact Start -->
        <a class='informasi' href='javascript:void(0)' title='Chat Whatsapp'>
            <div class='info-avatar'>
                <img src='<?php if (!empty($numberchat['representative_1_imageeeeee']['url'])) {
                    echo esc_url($numberchat['representative_1_imageeeeee']['url']);
                } ?>' alt='Representative Image' />
            </div>
            <div class='info-chat'>
                <span class='chat-label'>
                    <?php if (!empty($numberchat['txt-custmer_sales'])) {
                        echo esc_html($numberchat['txt-custmer_sales']);
                    } ?>
                </span>
                <span class='chat-nama'>
                    <?php if (!empty($numberchat['txt-custmer_service_1'])) {
                        echo esc_html($numberchat['txt-custmer_service_1']);
                    } ?>
                </span>
            </div>
            <span class='my-number'>
                <?php if (!empty($numberchat['number-custmer_service_1'])) {
                    echo esc_html($numberchat['number-custmer_service_1']);
                } ?>
            </span>
        </a>
        <!-- Info Contact End -->
        <div class='blanter-msg'>
            <?php echo esc_html($numberchat['txt-exam']); ?>
        </div>
    </div>
    <div class='start-chat hide'>
        <div class='first-msg'>
            <span><?php echo esc_html($numberchat['representative_1_message_text']); ?></span>
        </div>
        <div class='blanter-msg'>
            <textarea id='chat-input' placeholder='Write a response' maxlength='120' rows='1'></textarea>
            <a href='javascript:void(0);' id='send-it'>Send</a>
        </div>
    </div>
    <div id='get-number'></div>
    <a class='close-chat' href='javascript:void(0)'>×</a>
</div>
<a class='blantershow-chat' href='javascript:void(0)' title='Show Chat'>
    <i class='fab fa-whatsapp'></i><?php echo esc_html($numberchat['need_help_text']); ?>
</a>
