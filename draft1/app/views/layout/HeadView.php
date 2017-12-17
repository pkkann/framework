<?php
class HeadView extends View {

    public function output() {
        return '
		<div class="ui top inverted fixed menu">
			<div class="item">
				<h2>Logo</h2>
			</div>
			<a class="item">Users</a>
			<a class="item">Something else</a>
		</div>
        ';
    }

}