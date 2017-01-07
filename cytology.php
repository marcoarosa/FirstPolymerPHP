<app-toolbar>
    <paper-button noink drawer-toggle>
        <iron-icon icon="vaadin-icons:menu"></iron-icon>
    </paper-button>
    <div main-title>Cytology</div>
    <paper-icon-button icon="info" onclick="document.getElementById('endDrawer').toggle();"></paper-icon-button>
</app-toolbar>


<div class="content">
    <!--<paper-dialog id="modal" modal>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <div class="buttons">
            <paper-button dialog-confirm autofocus>Tap me to close</paper-button>
        </div>
    </paper-dialog>

    <paper-card heading="Content Title">
        <paper-button raised onclick="modal.open()">modal dialog</paper-button>
        <div class="card-actions">
            <paper-button raised>Some action</paper-button>
        </div>
    </paper-card>

    <paper-card heading="Content Title">
        <div class="card-content">Some content</div>
        <div class="card-actions">
            <paper-button>Some action</paper-button>
            <paper-button>Another action</paper-button>
        </div>
    </paper-card>-->

    <paper-card width="100%">
        <div class="card-content">Search</div>
        <paper-input label="Search">

        </paper-input>
        <vaadin-grid selection-mode="multi">
            <table>
                <colgroup>
                    <col sortable>
                    <col sortable>
                    <col sortable>
                </colgroup>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Progress</th>
                    </tr>
                </thead>
            </table>
        </vaadin-grid>
    </paper-card>
</div>
