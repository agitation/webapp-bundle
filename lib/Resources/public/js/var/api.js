ag.api.Endpoint.register({
    "app.v1/Password.reset": [
        "app.v1/Login",
        "null"
    ],
    "app.v1/Session.login": [
        "app.v1/Login",
        "null"
    ],
    "app.v1/Session.logout": [
        "null",
        "null"
    ]
});
ag.api.Object.register({
    "app.v1/Login": {
        "props": {
            "email": {
                "type": "string"
            },
            "password": {
                "type": "string"
            }
        }
    }
});
