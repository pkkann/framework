<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Error</title>

        <!-- jQuery -->
        <script src="<?= $GLOBALS['base_url'] ?>/libraries/jquery/jquery-3.2.1.min.js"></script>

        <!-- Semantic-ui -->
        <script src="<?= $GLOBALS['base_url'] ?>/libraries/semantic-ui/semantic.min.js"></script>
        <link rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/libraries/semantic-ui/semantic.min.css">
    </head>
    <body>
        <style>
        h1 {
            font-size: 48px;
            margin-bottom: 0;
        }
        h2 {
            font-weight: normal;
            margin-top: 0;
        }

        .wrap {
            position: fixed;
            width: 1024px;
            background: #EEEEEE;
            left: 0;
            right: 0;
            margin: 0 auto;
            top: 0px;
            bottom: 0px;
            border-left: 8px dashed #C0C0C0;
            border-right: 8px dashed #C0C0C0;
            overflow: auto;
            
        }
            .wrap div {
                padding: 150px 45px;
                text-align: center;
            }
        </style>
        <div class="wrap">
            <div>
                <h1>Woops!</h1>
                <h2>It looks like we have an error</h2>
            <?php if($GLOBALS['debug']): ?>
                <pre style="text-align: left;"><?= print_r($e) ?></pre>
            <?php else: ?>
                <pre>The page requested does not exist :'(</pre>
            <?php endif; ?>
            </div>
        </div>
    </body>
</html>