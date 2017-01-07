<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">

    <title>PCG LIS</title>

    <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!--    <link rel="import" href="bower_components/font-roboto/roboto.html">-->
    <link rel="import" href="bower_components/iron-icons/iron-icons.html">
    <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="bower_components/paper-dialog/paper-dialog.html">
    <link rel="import" href="bower_components/app-layout/app-toolbar/app-toolbar.html">
    <link rel="import" href="bower_components/app-layout/app-drawer/app-drawer.html">
    <link rel="import" href="bower_components/app-layout/app-drawer-layout/app-drawer-layout.html">
    <!--    -- For the listbox
        <link rel="import" href="bower_components/paper-item/paper-item.html">
        <link rel="import" href="bower_components/iron-collapse/iron-collapse.html">
        <link rel="import" href="bower_components/paper-listbox/paper-listbox.html">
        <link rel="import" href="bower_components/paper-styles/demo-pages.html">-->

    <!-- For the menus -->
    <link rel="import" href="bower_components/paper-menu/paper-menu.html">
    <link rel="import" href="bower_components/paper-card/paper-card.html">
    <link rel="import" href="bower_components/paper-button/paper-button.html">
    <link rel="import" href="bower_components/paper-item/paper-item.html">
    <link rel="import" href="bower_components/vaadin-grid/vaadin-grid.html">
    <link rel="import" href="bower_components/paper-input/paper-input.html">
    <link rel="import" href="bower_components/paper-fab/paper-fab.html">

    <style is="custom-style">

        body {
            margin: 0;
            font-family: 'Roboto', 'Noto', sans-serif;
            background-color: #eee;
        }

        .content {
            @apply(--layout-flex);
            height: 1000px;
        }

        app-toolbar {
            background-color: #4285f4;
            color: #fff;
        }

        app-drawer {
            --app-drawer-content-container: {
                background-color: #fff;
            }
        }

        footer {
            height: 50px;
            line-height: 50px;
            text-align: center;
            background-color: white;
            font-size: 14px;
        }

        paper-item {
            --paper-item: {
                cursor: pointer;
            };
        }

        .horizontal-section {
            padding: 0 !important;
        }


        paper-card {
            margin: 8px;
            padding: 10px;
            padding-right: 20px;
            width: 95%;
            color: #757575;
            border-radius: 1px;
            background-color: #fff;
            /*box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
*/
        }


       paper-fab.blue {
            --paper-fab-background: var(--paper-light-blue-500);
            --paper-fab-keyboard-focus-background: var(--paper-light-blue-900);
        }

        .topRight {
            position: absolute;
            top: 8px;
            right: -10px;
            /*font-size: 18px;*/
            z-index: 100;
        }

    </style>

</head>
<body>
    <?php

$sUsername = 'b39cf14a9fe1b5';
$sPassword = '09115249';
$sHost = 'us-cdbr-azure-east-c.cloudapp.net';
$sDb = 'pcg';

try {

    //echo date('Y-m-d H:i:s');

    $db = new PDO('mysql:host='.$sHost.';dbname='.$sDb, $sUsername, $sPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->query('SELECT * FROM patients');
    $row_count = $stmt->rowCount();
    echo $row_count.' rows selected   ';

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo $results;

    $output = ['data' => $results];
    $jsonTable = json_encode($output);
    $jsonFormatted = str_replace("\"" ,"'",
        str_replace("{\"" ,"{",
            str_replace("\",\"" ,"\",",
                str_replace("\":\"" ,":\"",
                    str_replace("null" ,"\"\"",
                        substr($jsonTable,8,strlen($jsonTable)-9))))));

    //echo $jsonTable;

    //echo date('Y-m-d H:i:s');

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

    ?>



<app-drawer-layout waterfall fullbleed >  <!--fullbleed to fill all of top-->

    <app-drawer swipe-open>

        <paper-menu selected="0">

            <paper-item>Home</paper-item>
            <paper-item>About</paper-item>
            <paper-item>Schedule</paper-item>
            <paper-item>Account</paper-item>

        </paper-menu>
    </app-drawer>

    <app-toolbar>
        <paper-icon-button icon="menu" drawer-toggle></paper-icon-button>
        <div main-title>Current Page</div>
        <paper-icon-button icon="info" onclick="document.getElementById('endDrawer').toggle();"></paper-icon-button>
    </app-toolbar>

    <div class="content">



        <paper-button raised onclick="modal.open()">modal dialog</paper-button>
        <paper-dialog id="modal" modal>
            <p>
                <?php echo $jsonTable; ?>
            </p>
            <div class="buttons">
                <paper-button dialog-confirm autofocus>Tap me to close</paper-button>
            </div>

        </paper-dialog>
        <paper-card heading="Content Title">
            <p >
                <?php
                echo  str_replace("\"" ,"'",
                    str_replace("{\"" ,"{",
                        str_replace("\",\"" ,"\",",
                            str_replace("\":\"" ,":\"",
                                str_replace("null" ,"\"\"",
                                    substr($jsonTable,8,strlen($jsonTable)-9))))))  ?>

            </p>
            <div class="card-content">Some content</div>
            <div class="card-actions">
                <paper-button>Some action</paper-button>
                <paper-button>Another action</paper-button>
            </div>
        </paper-card>


        <paper-card width = "100%" heading="Content Title">
            <paper-fab id="btnAdd" icon="add" title="heart" class="blue topRight"></paper-fab>
            <paper-input id="filter" label="Filter by first name"></paper-input>
            <vaadin-grid id="vgPatients" selection-mode="multi" frozen-columns="1">
                <table>
                    <colgroup>
                        <col name="FirstName" sortable/>
                        <col name="LastName" sortable/>
                        <col name="DOB" sortable/>
                    </colgroup>
                    <tfoot>
                    <tr>
                        <th colspan="4">Number of selected rows:
                            <span id="selected-counter">0</span>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </vaadin-grid>

            <script>
                (function() {
                    HTMLImports.whenReady(function() {
                        var grid = document.querySelector('#vgPatients');
                        var users = [];
                        var users2 = [];
                        var selected = [];

                        /*getJSON('https://demo.vaadin.com/demo-data/1.0/people', function(json) {
                            users = json.result;
                            grid.items = users;
                        });*/

                        users2 = [{PatID:'1',FirstName:'Marco',LastName:'Lasto',MI:'',DOB:'1988-10-19',Sex:'M',CreateTS:'2016-10-26 19:55:17'}
                            ,{PatID:'2',FirstName:'Jase',LastName:'second',MI:'',DOB:'1990-10-10',Sex:'M',CreateTS:'2016-10-27 01:11:38'}
                            ,{PatID:'3',FirstName:'Rith',LastName:'Ultim',MI:'',DOB:'1995-10-12',Sex:'M' ,CreateTS:'2016-10-27 01:23:49'}
                        ];

                        var data = ""+ <?php echo json_encode($jsonFormatted); ?>;

                        console.log("Variable Data: "+data);
                        users = eval('(' + data + ')');


                        grid.items = users;

                        grid.addEventListener('sort-order-changed', function() {
                            var sortOrder = grid.sortOrder[0];
                            var sortProperty = grid.columns[sortOrder.column].name;
                            var sortDirection = sortOrder.direction;
                            grid.items.sort(function(a, b) {
                                var res;
                                var path = sortProperty.split('.');
                                for (var i = 0; i < path.length; i++) {
                                    a = a[path[i]];
                                    b = b[path[i]];
                                }
                                if (!isNaN(a)) {
                                    res = parseInt(a, 10) - parseInt(b, 10);
                                } else {
                                    res = a.localeCompare(b);
                                }

                                if ('desc' === sortDirection) {
                                    res *= -1;
                                }
                                return res;
                            });
                        });

                        var filterInput = document.querySelector('#filter');
                        filterInput.addEventListener('value-changed', function() {
                            var filterText = filterInput.value.toLowerCase();
                            grid.items = users.filter(function(val) {      // USE THE NAME OF THE ARRAY THAT YOU ARE USING HERE (users)
                                if (filterText) {
                                    return (val.FirstName.toLowerCase()).indexOf(filterText) > -1; // CHANGE HERE TO MATCH FIELD NAME (FirstName)
                                } else {
                                    return true;
                                }
                            });
                        });

                        grid.addEventListener('selected-items-changed', function() {
                            console.log('Selected: ' + grid.selection.selected());
                            console.log('Deselected: ' + grid.selection.deselected());
                        });

                        document.addEventListener('WebComponentsReady', function() {
                            var button = document.getElementById("btnAdd");
                            var toAdd = []
                            button.addEventListener('click', function () {
                                toAdd = grid.selection.selected();
                                console.log("about to process: "+toAdd);
                                console.log("button add clicked");
                                console.log('Selected: ' + grid.selection.selected());
                                console.log('Deselected: ' + grid.selection.deselected());

                            });
                        });

                    });

                    function getJSON(url, callback) {
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                callback(JSON.parse(xhr.responseText));
                            }
                        };
                        xhr.open('GET', url, true);
                        xhr.send();
                    }


                })();
            </script>
        </paper-card>


    </div>

    <footer>
        &copy; PCG LIS
    </footer>

<!--    <script>
        var grid = grid || document.querySelector('vaadin-grid');

        HTMLImports.whenReady(function() {
// code
/*            var data = [
                ['John Doe', 66958548, 0.8],
                ['Will Smith', 87654, 0.2],
                ['Ann Taylor', 12999, 0.6]
            ];*/


            grid.items = function(params, callback) {
                callback($JSON.slice(params.index, params.index + params.count));
            };
            grid.size = $JSON.length;

// end-code
        });
    </script>-->


</app-drawer-layout>

</body>
</html>