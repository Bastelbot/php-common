<?php
namespace Bastelbot\Common;

class Log {

    const ENABLE_INFO = true;       // info-meldungen in gelb
    const ENABLE_ERROR = true;      // fehler-meldungen in rot
    const ENABLE_DEBUG = true;      // debug-meldungen in blau
    const ENABLE_PROGRESS = true;   // fortschritts-meldungen in lila (kein umbruch!)
    const ENABLE_LEVEL = 0;         // mindest nachrichten-level
    const ENABLE_LOGFILE = false;   // meldungen in logdatei speichern

    protected static $logfile = './common.log';

    static function _log_ ($msg, $pre = '')
    {
        $pre = (empty($pre)) ? '' : str_pad($pre, 8);
        $msg = "$pre$msg\n";
        if(self::ENABLE_LOGFILE)
        {
            $hdl = fopen(self::logfile, 'a');
            fwrite($hdl, $msg);
            fclose($hdl);
        }
        echo $msg;
    }

    static function info ($msg, $lvl=0)
    {
        if(!self::ENABLE_INFO) return;
        if(self::ENABLE_LEVEL > $lvl) return;
        echo "\033[0;33m";
        self::_log_($msg, 'INFO:');
        echo "\033[0m";
    }

    static function error ($msg, $lvl=0)
    {
        if(!self::ENABLE_ERROR) return;
        if(self::ENABLE_LEVEL > $lvl) return;
        echo "\033[1;31m";
        self::_log_($msg, 'ERROR:');
        echo "\033[0m";
    }

    static function debug ($msg, $lvl=0)
    {
        if(!self::ENABLE_DEBUG) return;
        if(self::ENABLE_LEVEL > $lvl) return;
        echo "\033[0;36m";
        self::_log_($msg, 'DEBUG:');
        echo "\033[0m";
    }

    static function progress ()
    {
        if(!self::ENABLE_DEBUG) return;
        echo "\033[0;35m";
        echo '.';
        echo "\033[0m";
    }
}
