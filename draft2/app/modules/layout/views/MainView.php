<?php
class MainView extends View {

    public function output() {
        $module = Router::instance()->module();
        $action = Router::instance()->action();

        $nav = array(
            (object)['t' => "Users", 'm' => "users", 'a' => "overview"]
        );

        $nav_html = '';
        foreach ($nav as $n) {
            $active = "";
            if($module == $n->m && $action == $n->a) {
                $active = "active";
            }
            $nav_html .= '<a class="item '.$active.'" href="'.$GLOBALS['base_url'].'?module='.$n->m.'&action='.$n->a.'">'.$n->t.'</a>';
        }

        return '
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">

                    <!-- jQuery -->
                    <script src="'.$GLOBALS['base_url'].'/libraries/jquery/jquery-3.2.1.min.js"></script>

                    <!-- Semantic-ui -->
                    <script src="'.$GLOBALS['base_url'].'/libraries/semantic-ui/semantic.min.js"></script>
                    <link rel="stylesheet" href="'.$GLOBALS['base_url'].'/libraries/semantic-ui/semantic.min.css">

                    <link rel="stylesheet" href="'.$GLOBALS['base_url'].'/css/layout/mainview.css">
                </head>
                <body>
                    <div class="ui top fixed menu inverted huge">
                        <div class="ui container">
                        '.$nav_html.'
                        </div>
                    </div>
                    <div id="content" class="ui container">
                    '.$this->data['content'].'
                    </div>
                </body>
            </html>
        ';
    }

}