define({ "api": [
  {
    "type": "post",
    "url": "seguridad/usuarios/perfil",
    "title": "Solicitud de datos del perfil de usuario",
    "name": "perfilUsuario",
    "group": "Usuarios",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "usuarioID",
            "defaultValue": "NULL",
            "description": "<p>ID del Usuario dentro del sistema. Si el valor es NULL se responde con los datos del usuario logueado.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Usuarios",
            "optional": false,
            "field": "DatosUsuario",
            "description": "<p>Datos del Usuario con el colaborador asociado.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"firstname\": \"John\",\n  \"lastname\": \"Doe\"\n}",
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
            "field": "UserNotFound",
            "description": "<p>The id of the User was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n{\n  \"error\": \"UserNotFound\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "api/modulos/seguridad/controladores/Usuarios.control.php",
    "groupTitle": "Usuarios"
  }
] });
