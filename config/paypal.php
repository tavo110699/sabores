<?php
return array(
/** set your paypal credential **/
'client_id' =>'AT7aTOcLfHahYK0irhnfuQX_RTSRSTYb_sV-yxYk_YroMcNVnQqn7RT0FjEdbnz7C-iDyc8yXq-h7I_f',
'secret' => 'EBuh8FIPa5GYjPmb12tKvoguIg68zy8AH_hAyuk4l2ofj8SmyspIpY4K0pS4M6TibeWREfe9zLEdKGfb',
/**
 * SDK configuration
 */
'settings' => array(
    /**
     * Available option 'sandbox' or 'live'
     */
    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => storage_path() . '/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
),
);
?>