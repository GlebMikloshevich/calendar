<?php


class View
{
    private static $template_dir = './templates/';

    public static function create($path, $vars) {
        ob_start();
        require_once self::$template_dir . $path;
        $template = ob_get_clean();
        ob_end_clean();
//        var_dump($vars);
        foreach ($vars as $key => $value) {
            $$key = $value;
        }

        // IF - ELSE - ENDIF
        preg_match_all('/\{IF\?(.*?)\}[\s]*?(.*)[\s]*?(\{ELSE\}[\s]*?(.*?)[\s]*?)\{ENDIF\}/i', $template, $regs, PREG_PATTERN_ORDER);
        for ($i = 0; $i < count($regs[0]); $i++) {
            $condition = $regs[1][$i];
            $trueval   = $regs[2][$i];
            $falseval  = (isset($regs[4][$i])) ? $regs[4][$i] : false;
            $res = eval('return ('.$condition.');');
            if ($res===true) {
                $template = str_replace($regs[0][$i], $trueval, $template);
            } else {
                $template = str_replace($regs[0][$i], $falseval, $template);
            }
        }



        // IF - ENDIF
        preg_match_all('/\{IF\?(.*?)\}[\s]*?(.*)[\s*]*?{ENDIF\}/i', $template, $regs, PREG_PATTERN_ORDER);
        for ($i = 0; $i < count($regs[0]); $i++) {
            $condition = $regs[1][$i];
            $trueval   = $regs[2][$i];
            $res = eval('return ('.$condition.');');
            if ($res===true) {
                $template = str_replace($regs[0][$i],$trueval,$template);
            } else {
                $template = str_replace($regs[0][$i],'',$template);
            }
        }


        // Variables
        preg_match_all('/\{(.*?)\}/i', $template, $regs, PREG_SET_ORDER);
        for ($i = 0; $i < count($regs[0]); $i++){
            $varname = $regs[$i][1];
            if (isset($vars[$varname])) {
                $template = str_replace($regs[$i][0],$vars[$varname], $template);
            } else {
                $template = str_replace($regs[$i][0],'', $template);
            }
        }
        echo $template;
    }
}