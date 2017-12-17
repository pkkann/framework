<?php
class OverviewView extends View {

    public function output() {
        return '
        <div class="ui container" style="margin-top: 10px;">
            

            <table id="example" class="ui celled table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fornavn</th>
                        <th>Efternavn</th>
                        <th>Alder</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <script>
        $(document).ready(function() {
            $("#example").DataTable( {
                "dom": \'<"ui menu">\',
                "ajax": "'.$GLOBALS['base_url'].'?route=usersjson",
                "columns": [
                    { "data": "id" },
                    { "data": "firstname" },
                    { "data": "lastname" },
                    { "data": "age" }
                ]
            } );
        } );
        </script>
        ';
    }

}