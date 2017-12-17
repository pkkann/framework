<?php
class MainView extends View {

    public function output() {
        return '
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <title>Test</title>

                    <script src="libs/jquery/jquery-3.2.1.min.js"></script>
                    <!--<script src="libs/popper/popper.js"></script>-->

                    <!--<link rel="stylesheet" href="libs/bootstrap-4.0.0-beta2/css/bootstrap.min.css">
                    <script src="libs/bootstrap-4.0.0-beta2/js/bootstrap.min.js"></script>-->

                    <link rel="stylesheet" href="libs/semantic-ui/semantic.min.css">
                    <script src="libs/semantic-ui/semantic.min.js"></script>

                    <link rel="stylesheet" href="libs/datatables/datatables.css">
                    <script src="libs/datatables/datatables.js"></script>

                    <link rel="stylesheet" href="css/layout.css">
                </head>
                <body>
                    '.$this->head.'
                    <div id="content">
                    '.$this->content.'
                    </div>
                </body>
            </html>
        ';
    }

}