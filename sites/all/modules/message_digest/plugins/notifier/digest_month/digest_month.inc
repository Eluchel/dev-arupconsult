<?php

$plugin = array(
    'title' => t('Monthly Message Digest'),
    'description' => t('Send Message via monthly digest.'),
    'class' => 'MessageDigestMonth',
    'view_modes' => array(
        'message_notify_month_digest' => array('label' => t('Notify - Monthly digest')),
    ),
);