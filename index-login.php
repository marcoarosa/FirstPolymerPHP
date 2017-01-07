﻿<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">

    <title>PCG LIS</title>

    <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->


    <link rel="import" href="../bower_components/polymer/polymer.html">
    <link rel="import" href="../bower_components/paper-input/paper-input.html">
    <link rel="import" href="../bower_components/paper-button/paper-button.html">
    <link rel="import" href="../bower_components/iron-a11y-keys/iron-a11y-keys.html">
    <link rel="import" href="../bower_components/iron-form/iron-form.html">


    <style>
        :host {
            background: var(--dark-primary-color);
            min-height: 400px;
        }

        .login paper-input {
            width: 100%;
            --paper-input-container-input-color: var(--text-primary-color);
            --paper-input-container-underline:;

        {
            background: rgba(255, 255, 255, 0.2);
        }

        }

        #login-button {
            margin: 20px 0 0 0;
            padding-left: 30px;
            padding-right: 30px;
            background: var(--primary-color);
            color: var(--text-primary-color);
        }

        .error-message {
            color: red;
        }

        .header {
            height: 36%;
            display: flex;
            flex-direction: column;
            flex: 1;
            justify-content: flex-end;
            margin: 0 !important;
            padding: 0 !important;
        }

            .header::after {
                content: "";
                position: absolute;
                width: 100%;
                top: 36%;
                border-bottom: 2px solid var(--accent-color);
            }

            .header h1 {
                color: var(--text-primary-color);
                font-size: 24px;
                font-weight: 300;
                margin: 0 auto 16px;
                width: 300px;
            }

        .login {
            width: 300px;
            margin: 16px auto;
        }

        #footer {
            font-size: 14px;
            background: #3d4446;
            padding: 14px 26px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            box-sizing: border-box;
            align-items: center;
            position: absolute;
            bottom: 0;
            color: var(--text-primary-color);
        }

            #footer a {
                text-decoration: none;
                color: var(--primary-color);
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
    <iron-a11y-keys keys="enter" on-keys-pressed="_logIn"></iron-a11y-keys>
    <div id="header" class="header">
        <h1>Expense Manager</h1>
    </div>
    <div class="login">
        <paper-input value={{username}} label="Username" name="username"></paper-input>
        <paper-input value="{{password}}" label="Password" name="password" type="password"></paper-input>
        <span class="error-message">[[errorMessage]]</span>
        <paper-button id="login-button" on-tap="_logIn" raised>Login</paper-button>
    </div>
    <div id="footer">
        <span class="fork-me">
            Fork me on <a href="https://github.com/vaadin/expense-manager-demo">GitHub</a>
        </span>
        <span class="built-with">
            Built with <a href="https://vaadin.com/elements">Vaadin Elements</a>
        </span>
    </div>
    </template>

    <script>
    (function() {
      'use strict';
      Polymer({
        is: 'login-page',
        properties: {
          loggedIn: {
            type: Boolean,
            notify: true
          },
          username: {
            type: String,
            value: 'demo'
          },
          password: {
            type: String,
            value: 'demo'
          },
          errorMessage: String
        },

        _logIn: function() {
          this.loggedIn = true;
        }
      });
    })();
    </script>


</body>
</html>