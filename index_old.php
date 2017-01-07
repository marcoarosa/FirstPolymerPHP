<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">

    <title>PCG LIS</title>

    <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <!--<link rel="import" href="bower_components/font-roboto/roboto.html">-->
    <link rel="import" href="bower_components/iron-icons/iron-icons.html">
    <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="bower_components/paper-dialog/paper-dialog.html">
    <link rel="import" href="bower_components/app-layout/app-toolbar/app-toolbar.html">
    <link rel="import" href="bower_components/app-layout/app-drawer/app-drawer.html">
    <link rel="import" href="bower_components/app-layout/app-drawer-layout/app-drawer-layout.html">
    <link rel="import" href="bower_components/paper-input/paper-input.html" >
    <link rel="import" href="bower_components/paper-menu-button/paper-menu-button.html" >
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

    <!--Vaadin Grid-->
    <link rel="import" href="bower_components/vaadin-grid/vaadin-grid.html" >
    <link rel="import" href="bower_components/vaadin-icons/vaadin-icons.html" >

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
            width: 98%;
            color: #757575;
            border-radius: 1px;
            background-color: #fff;
            /*box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
*/
        }

        paper-button {
            padding-top: 10px;
        }

    </style>

    <script>
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
    </script>

</head>
<body>


<app-drawer-layout fullbleed>  <!--fullbleed to fill all of top-->
    <app-drawer swipe-open>
        <paper-menu selected="0">
            <paper-item id="accession_link">Accession</paper-item>
            <paper-item id="cytology_link">Cytology</paper-item>
            <paper-item id="pathology_link">Pathology</paper-item>
            <paper-item id="molecular_link">Molecular</paper-item>
            <paper-item id="settings_link">Settings</paper-item>
            <!--                <paper-menu class="menu-content sublist" multi>
                                <paper-submenu label="Properties">
                                    <paper-item class="menu-trigger">Properties</paper-item>
                                    <paper-menu class="menu-content sublist2">
                                        <paper-item>focusedItem</paper-item>
                                        <paper-item>attrForItemTitle</paper-item>
                                    </paper-menu>
                                </paper-submenu>
                                <paper-submenu label="Methods">
                                    <paper-item class="menu-trigger">Methods</paper-item>
                                    <paper-menu class="menu-content sublist2">
                                        <paper-item>select(value)</paper-item>
                                    </paper-menu>
                                </paper-submenu>

                            </paper-menu>-->
        </paper-menu>
    </app-drawer>

    <div id="accession" style="display:none;"><?php include 'accession.php'; ?></div>
    <div id="cytology" style="display:none;"><?php include 'cytology.php'; ?></div>
    <div id="pathology" style="display:none;"><?php include 'pathology.php'; ?></div>
    <div id="molecular" style="display:none;"><?php include 'molecular.php'; ?></div>
    <div id="settings" style="display:none;"><?php include 'settings.php'; ?></div>

    <footer>&copy; PCG LIS</footer>
</app-drawer-layout>

<script>
jQuery("#accession_link").click(function() {
    jQuery("#accession").show();
    jQuery("#cytology").hide();
});
jQuery("#cytology_link").click(function () {
    jQuery("#cytology").show();
    jQuery("#accession").hide();
});


var grid = grid || document.querySelector('vaadin-grid');

HTMLImports.whenReady(function() {
// code
var data = [
    ['John Doe', 66958548, 0.8],
    ['Will Smith', 87654, 0.2],
    ['Ann Taylor', 12999, 0.6]
];

grid.items = function(params, callback) {
    callback(data.slice(params.index, params.index + params.count));
};
grid.size = data.length;

// end-code
});
</script>
</body>
</html>