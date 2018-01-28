ag.api.Endpoint.register({
    "app.v1/Password.reset": [
        "app.v1/Login",
        "common.v1/ScalarNull"
    ],
    "app.v1/Session.login": [
        "app.v1/Login",
        "common.v1/ScalarNull"
    ],
    "app.v1/Session.logout": [
        "common.v1/ScalarNull",
        "common.v1/ScalarNull"
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
