define({ "api": [
  {
    "type": "post",
    "url": "/login",
    "title": "login into api",
    "name": "login",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "user",
            "description": "<p>username required.</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "pass",
            "description": "<p>password required.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "json",
            "optional": false,
            "field": "Results",
            "description": "<p>login information.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "json",
            "optional": false,
            "field": "Results",
            "description": "<p>Failed information.</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "application/modules/Users/controllers/Users.php",
    "groupTitle": "Users"
  }
] });
