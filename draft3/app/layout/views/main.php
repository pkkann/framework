<?php $this->layout('layouts::index') ?>

<style>
    body {
        background: #EEEEEE;
    }
    #content {
        
        overflow: auto;
        padding-top: 65px;
        padding-bottom: 25px;
    }
</style>
<div id="top" class="ui top fixed menu">
    <div class="ui container">
        <a class="item <?=$this->e($this->menuActive("dashboard", "index"))?>" href="<?=$this->e($this->action("dashboard", "index"))?>">Dashboard</a>
        <a class="item <?=$this->e($this->menuActive("dashboard", "text"))?>" href="<?=$this->e($this->action("dashboard", "test"))?>">Test</a>
        <div class="right menu">
            <div class="ui dropdown item">
                <div class="text"><i class="user circle icon"></i> <?= $this->e($user->name) ?></div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="<?=$this->e($this->action("login", "deauthenticate"))?>">Log ud <i class="sign out icon"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="ui container">
    <?=$this->section('content')?>
    </div>
</div>

<script>
$('.ui.dropdown')
  .dropdown()
;
</script>