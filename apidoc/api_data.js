define({ "api": [
  {
    "type": "get",
    "url": "/carpooling/getCards/",
    "title": "getCards",
    "name": "getCards",
    "group": "Carpooling",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "offset",
            "description": "<p>pagination</p>"
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
            "description": "<p>trips cards information.</p>"
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
    "filename": "application/modules/carpooling/controllers/Carpooling.php",
    "groupTitle": "Carpooling"
  },
  {
    "type": "post",
    "url": "/Users/forgotPassword/",
    "title": "reset user password",
    "name": "forgotPassword",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "token",
            "description": "<p>bearer token.</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "password",
            "description": "<p>new password.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"message\": \"Password Changed\",\n  \"code\": \"200\",\n  \"data\": {}",
          "type": "json"
        }
      ]
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
  },
  {
    "type": "get",
    "url": "/Users/id/:id",
    "title": "Get  user information",
    "name": "id",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "id",
            "description": "<p>id user required.</p>"
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
            "description": "<p>user information.</p>"
          }
        ],
        "Success 204": [
          {
            "group": "Success 204",
            "type": "json",
            "optional": false,
            "field": "Results",
            "description": "<p>User empty.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"200\",\n  \"message\": \"OK\",\n  \"data\": {\n        \"user\":[\n           {\n               \"id\": \"88\",\n                \"created\": \"2019-11-29 14:14:30\",\n                \"modified\": \"2020-01-23 10:38:15\",\n                \"first_name\": \"Pepito\",\n                \"last_name\": \"De los palotes\",\n                \"emp_number\": null,\n                \"dob\": \"1965-01-01\",\n                \"prefix_telephone\": \"34\",\n                \"telephone\": \"682663120\",\n                \"workphone\": null,\n                \"username\": \"pepito_collaborativeperks_com\",\n                \"password\": \"13ab622eda738da765d87cbac52b9e54bf7e4080572efb4fdc445fc6d23b8f61\",\n                \"email\": \"pepito@collaborativeperks.com\",\n                \"address\": \"\",\n                \"gender\": \"man\",\n                \"type\": \"user\",\n                \"is_paid\": null,\n                \"is_active\": \"1\",\n                \"is_delete\": \"0\",\n                \"is_sms_verified\": \"1\",\n                \"is_whatsapp_user\": \"1\",\n                \"is_subscribed_newsletter\": \"1\",\n                \"is_cookie\": \"1\",\n                \"expiration_date\": null,\n                \"about_me\": \"\",\n                \"platform_language\": \"149\",\n                \"place_id\": null,\n                \"company_id\": null,\n                \"subsidiary\": null,\n                \"is_promoted\": \"0\",\n                \"newsletter_frequency\": \"all\",\n                \"country_name\": \"Spain\"\n           }\n         ]   \n     }  \n}",
          "type": "json"
        },
        {
          "title": "No Content-Response:",
          "content": "HTTP/1.1 204 No Content\n{\n  \"code\": \"204\",\n  \"message\": \"No Content\",\n  \"data\": {}\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "Users/id",
            "description": "<p>404 userid The id of the User was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"code\": \"404\",\n  \"message\": \"Not Found\"\n  \"data\": \"{}\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "application/modules/Users/controllers/Users.php",
    "groupTitle": "Users"
  },
  {
    "type": "post",
    "url": "Users/login",
    "title": "Login into api",
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
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"code\": \"200\",\n  \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9d.eyJpZCI6IjEyMyIsImVtYWlsIjoiZWxpYXNAY29sbGFib3JhdGl2ZXBlcmtzLmNvbSIsImZpcnN0X25hbWUiOiJFbGlhcyIsImxhc3RfbmFtZSI6ImVzcGlubyIsInR5cGUiOiJhZG1pbiIsImlhdCI6MTU3OTc3MzI2NywiZXhwIjoxNTc5Nzc2ODY3fQ.4MYQ8KlLXhO1ajpIdE7pAEiVV5F0-ZMQIFyiv6cE9zQ0\",\n  \"data\": {\n        \"user\":[\n           {\n               \"id\": \"88\",\n                \"created\": \"2019-11-29 14:14:30\",\n                \"modified\": \"2020-01-23 10:38:15\",\n                \"first_name\": \"Pepito\",\n                \"last_name\": \"De los palotes\",\n                \"emp_number\": null,\n                \"dob\": \"1965-01-01\",\n                \"prefix_telephone\": \"34\",\n                \"telephone\": \"682663120\",\n                \"workphone\": null,\n                \"username\": \"pepito_collaborativeperks_com\",\n                \"password\": \"13ab622eda738da765d87cbac52b9e54bf7e4080572efb4fdc445fc6d23b8f61\",\n                \"email\": \"pepito@collaborativeperks.com\",\n                \"address\": \"\",\n                \"gender\": \"man\",\n                \"type\": \"user\",\n                \"is_paid\": null,\n                \"is_active\": \"1\",\n                \"is_delete\": \"0\",\n                \"is_sms_verified\": \"1\",\n                \"is_whatsapp_user\": \"1\",\n                \"is_subscribed_newsletter\": \"1\",\n                \"is_cookie\": \"1\",\n                \"expiration_date\": null,\n                \"about_me\": \"\",\n                \"platform_language\": \"149\",\n                \"place_id\": null,\n                \"company_id\": null,\n                \"subsidiary\": null,\n                \"is_promoted\": \"0\",\n                \"newsletter_frequency\": \"all\",\n                \"country_name\": \"Spain\"\n           }\n         ]   \n     }  \n}",
          "type": "json"
        }
      ]
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
  },
  {
    "type": "post",
    "url": "/Users/register/",
    "title": "register",
    "name": "register",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "token",
            "description": ""
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "email",
            "description": ""
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "terms",
            "description": ""
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "policy",
            "description": ""
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "first_name",
            "description": ""
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "last_name",
            "description": ""
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "gender",
            "description": ""
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "platform_language",
            "description": ""
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "newsletter",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n   \"message\": \"User registred\",\n   \"code\": \"200\",\n   \"data\": {}\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"message\": \"invalid parameters\",\n  \"code\": \"404\"\n \"data\": \"null\"\n}",
          "type": "json"
        }
      ],
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
  },
  {
    "type": "post",
    "url": "/Users/requestPassword/",
    "title": "Request user password",
    "name": "requestPassword_post",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "email",
            "description": "<p>User's emails.</p>"
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
  },
  {
    "type": "post",
    "url": "/Users/requestRegister/",
    "title": "request register",
    "name": "requestRegister",
    "group": "Users",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "email",
            "description": ""
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n   \"message\": \"Password Changed\",\n   \"code\": \"200\",\n   \"data\": {}\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"message\": \"invalid email\",\n  \"code\": \"404\"\n \"data\": \"null\"\n}",
          "type": "json"
        }
      ],
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
