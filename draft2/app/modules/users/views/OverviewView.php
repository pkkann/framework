<?php
class OverviewView extends View {

    public function __construct($data = null) {
        parent::__construct($data);
    }

    public function output() {
        return '
            <div class="container">
                <table class="ui selectable table cursor">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Patrick Kann</td>
                            <td>pk</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        ';
    }

}