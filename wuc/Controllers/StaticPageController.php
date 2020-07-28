<?php
namespace wuc\Controllers;

class StaticPageController {

    public function __construct() {
    }
      
    public function showStaticPage() {
        $pageName = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
        $title = '';

        switch($pageName) {
            case 'attendance':
                $title = 'Attendance';
                break;
            case 'timetable':
            $title = 'Timetable';
                break;
        }

        return ['template' => '../templates/' . $pageName . '.html.php',
                'title' => $title,
                'variables' => []
                ];
    }
}