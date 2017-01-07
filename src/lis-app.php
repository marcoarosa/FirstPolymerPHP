﻿<link rel="import" href="../bower_components/polymer/polymer.html">
<link rel="import" href="../bower_components/iron-pages/iron-pages.html">
<link rel="import" href="login-page.html">
<dom-module id="lis-app">
    <template>
        <style>
            :host {
                display: block;
            }

            #pages,
            #pages > * {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }

            :root {
                --dark-primary-color: #33383a;
                --primary-color: #00b4f0;
                --light-primary-color: #F2FAF9;
                --text-primary-color: #FFFFFF;
                --accent-color: #ff3a39;
                --light-accent-color: #F2FAF9;
                --primary-text-color: rgba(0, 0, 0, 0.87);
                --secondary-text-color: #727272;
                --primary-background-color: #FFFFFF;
                --disabled-text-color: #BDBDBD;
                --divider-color: #B6B6B6;
                --paper-menu-background-color: #fff;
                --menu-link-color: #111111;
                --paper-input-container-underline:;

            {
                background: #dbdbdb;
            }

            --paper-header-panel-shadow: {
                display: none;
            }

            --paper-header-panel-standard-container: {
                overflow: visible;
            }

            --vaadin-upload-button-add: {
                background: transparent;
                color: var(--primary-color);
                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
            }

            --vaadin-upload-buttons-primary: {
                flex-direction: column;
                align-items: center;
            }

            --section-title: {
                font-weight: 400;
                font-size: 13px;
                display: block;
                border-bottom: 1px solid rgba(0, 0, 0, 0.13);
                padding-bottom: 6px;
                margin-bottom: 18px;
                margin-top: 4px;
                color: rgba(0, 0, 0, 0.54);
            }

            iron-overlay-backdrop {
                --iron-overlay-backdrop-background-color: #33383A;
            }

            }
        </style>

        <iron-pages id="pages" selected="[[selected]]">
            <login-page id="login" logged-in="{{loggedIn}}"></login-page>
            <overview-page id="overview" logged-in="{{loggedIn}}"></overview-page>
        </iron-pages>

    </template>

    <script>
    (function() {
      'use strict';

      Polymer({
        is: 'expense-app',
        properties: {
          loggedIn: {
            type: Boolean,
            value: false,
            notify: true,
            observer: '_selectPage'
          },
          selected: {
            type: Number,
            notify: true
          }
        },

        ready: function() {
          // Start downloading and initializing the overview page once the login page has rendered
          Polymer.RenderStatus.afterNextRender(this.$.login, function() {
            this.importHref(this.resolveUrl('overview-page.html'),
              null, null, true);
          }.bind(this));
        },

        _selectPage: function() {
          this.selected = this.loggedIn ? 1 : 0;
        }

     
      });
    })();
    </script>
</dom-module>
